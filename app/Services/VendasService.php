<?php

namespace App\Services;

use App\Events\NFSeCriadaEvent;
use App\Events\VendaAtualizadaEvent;
use App\Events\VendaCriadaEvent;
use App\Exceptions\ServicoNaoSincronizadoException;
use App\Models\Cliente;
use App\Models\Empresa;
use App\Models\Integracao;
use App\Models\NFSe;
use App\Models\NFSeItemServico;
use App\Models\Servico;
use App\Models\ServicoIntegracao;
use App\Models\Venda;
use App\Models\VendaItem;
use App\Notifications\ErroAoGerarEmitirNF;
use App\Notifications\ErroAoImportarVenda;
use App\Notifications\ErroAoSincronizarVendasEmpresa;
use App\Services\Sped\SpedService;
use App\Services\Sped\SpedStatus;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class VendasService
{
    /**
     * Cria um registro de uma nova venda, calcula a data planejada de emissão do documento fiscal
     *
     * @param array $venda
     * @param array<array|VendaItem> $itens
     * @return NFSe|null
     */
    public function create(array $venda, array $itens) : ? Venda
    {
        try {
            DB::beginTransaction();

                $vendaDesconto = $venda['desconto'];
                if(is_nan($venda['desconto'])){
                    $vendaDesconto = 0;
                }
                $valorTotal = 0;
                foreach ($itens as $item) {
                    $valorTotal += $item->valor * $item->qtde;
                }

                $venda['valor'] = $valorTotal - $vendaDesconto;

                $venda = Venda::create($venda);

                if ($venda->data_emissao_planejada == null) {
                    /**
                     * Definição da data a ser emitido doc fiscal, hoje somente empresa_integrações tem informações
                     * para este cálculo, se não tem driver por hora define como emissão imediata
                     */
                    $venda->data_emissao_planejada = now();
                    if ($venda->driver) {
                        $venda->data_emissao_planejada = $this->calculoDataPlanejadaEmissaoNF($venda);
                        $venda->save();
                    }
                }

                $venda->itens()->saveMany($itens);

            DB::commit();

            VendaCriadaEvent::dispatch($venda);

            return $venda;

        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Erros ao gravar a Venda');
            Log::error($exception);

            return null;
        }
    }

    /**
     * Atualiza um registro de uma venda, calcula a data planejada de emissão do documento fiscal
     *
     * @param array $venda
     * @param array<array|VendaItem> $itens
     * @return NFSe|null
     */
    public function update(array $venda, array $itens) : ? Venda
    {
        try {
            DB::beginTransaction();
                $venda_db = Venda::find($venda['id']);

                $vendaDesconto = $venda['desconto'];
                if(is_nan($venda['desconto'])){
                    $vendaDesconto = 0;
                }
                $valorTotal = 0;
                foreach ($itens as $item) {
                    $valorTotal += $item->valor * $item->qtde;
                }

                $venda_db['valor'] = $valorTotal - $vendaDesconto;
                $dataPlanejada = (object) $venda['data_emissao_planejada'];
                $venda = $venda_db->fill($venda);

                if ($dataPlanejada == null) {
                    /**
                     * Definição da data a ser emitido doc fiscal, hoje somente empresa_integrações tem informações
                     * para este cálculo, se não tem driver por hora define como emissão imediata
                     */
                    $venda->data_emissao_planejada = now();
                    if ($venda->driver) {
                        $venda->fill([
                            'data_emissao_planejada' => $this->calculoDataPlanejadaEmissaoNF($venda)
                        ]);
                    }
                }
                $venda->save();
                $venda->itens()->delete();
                $venda->itens()->saveMany($itens);

            DB::commit();

            VendaAtualizadaEvent::dispatch($venda);

            return $venda;

        } catch (\Exception $exception) {
            DB::rollBack();
            dd($exception);
            Log::error('Erros ao atualizar a Venda');
            Log::error($exception);

            return null;
        }
    }

    public function calculoDataPlanejadaEmissaoNF(Venda $venda) : Carbon
    {
        $integracao = Integracao::where('empresa_id', $venda->empresa_id)
            ->where('driver', $venda->driver)
            ->where('tipo_documento', $venda->tipo_documento)
            ->first();

        if ($integracao->transmissao_automatica) return $venda->data_transacao;

        $dataPlanejada = $venda->data_transacao->add($integracao->transmissao_frequencia, $integracao->transmissao_periodo);

        if ($integracao->transmissao_apenas_dias_uteis) {
            $dataPlanejada = $dataPlanejada->currentOrNextBusinessDay();
        }

        return $dataPlanejada;
    }

    /**
     * Sincroniza as vendas importando da plataforma de integração e salvando novas
     * pelo driver id no banco de dados.
     *
     * @param Empresa $empresa Empresa para a qual o sync de serviços deve ser realizado
     * @param string $driver Nome do driver de plataforma para sincronizar
     * @param string $fromDate A partir de qual data deve sincronizar as vendas, no formato YYYY-MM-DD
     * @return array Vendas importadas e sincronizados da api de integração, já salvos no banco de dados
     * @throws \Throwable
     */
    public function syncFromPlatform(Empresa $empresa, string $driverName, string $fromDate) : array
    {
        $driver = (new EmpresaService())->driverIntegracao($empresa, $driverName);

        $vendasApi = $driver->getVendas($fromDate);

        $vendas = [];

        $success = true;
        foreach ($vendasApi as $vendaApi) {
            $venda = Venda
                ::where('driver', $driverName)
                ->where('driver_id', $vendaApi['driver_id'])
                ->first();

            /**
             * Somente inserção de novas vendas vindas da Api que ainda não foram criadas do nosso lado
             */
            if ($venda == null) {
                $venda = $this->hydrateVendaFromApi($empresa, $driverName, $vendaApi);

                if ($venda) {
                    try {
                        $itensServico = $this->hydrateItensServicoFromApi($empresa, $driverName, $vendaApi);
                        $vendaCriada = $this->create($venda->toArray(), $itensServico);
                        if ($vendaCriada) {
                            $vendas[] = $vendaCriada;
                        } else {
                            $success = false;
                        }
                    } catch (ServicoNaoSincronizadoException $e) {
                        Log::error($e);
                        $empresa->owner->notify(new ErroAoImportarVenda($empresa, $driverName, $vendaApi, $e->getMessage()));
                        $success = false;
                    }
                } else {
                    $success = false;
                }
            }
        }

        /**
         * Atualiza data da importação de vendas na integração somente se importou todas, senão permanece buscando
         * desde esta data antiga para garantir que a empresa corrigiu o erro na plataforma para não perder vendas importadas
         * TODO rever esta lógica, talvez adicionar um importar a partir de como função de tela
         */
        if ($success) {
            Integracao::where('empresa_id', $empresa->id)
                ->where('driver', $driverName)
                ->update([
                    'vendas_importadas_em' => now(),
                ]);
        }

        return $vendas;
    }

    /**
     * Monta uma instância de Venda a partir de um retorno da Api de Integração
     *
     * @param Empresa $empresa
     * @param string $driverName
     * @param array $vendaApi
     * @return Venda
     */
    protected function hydrateVendaFromApi(Empresa $empresa, string $driverName, array $vendaApi) : ?Venda
    {
        if ($vendaApi['cliente']['documento'] == null) {
            $mensagem = 'Não é possível importar vendas para clientes que não tenham o documento (CPF / CNPJ) preenchidos na plataforma de integração.';
            $empresa->owner->notify(new ErroAoImportarVenda($empresa, $driverName, $vendaApi, $mensagem));
            return null;
        }

        $venda = new Venda();

        $venda->empresa_id = $empresa->id;
        $venda->tipo_documento = $vendaApi['venda']['tipo_documento'];
        $venda->data_transacao = $vendaApi['venda']['data_emissao'];
        $venda->valor = $vendaApi['venda']['valor'];

        $venda->driver = $driverName;
        $venda->driver_id = $vendaApi['driver_id'];
        $venda->driver_dados = $vendaApi['driver_dados'];

        $cliente = Cliente::getByDoc($vendaApi['cliente']['documento']);

        if ($cliente == null) {
            $cliente = (new ClienteService())->create(
                array_merge(['empresa_id'=> $empresa->id], $vendaApi['cliente'])
            );
        }

        $venda->cliente_id = $cliente->id;

        return $venda;
    }

    /**
     * Monta um array com instâncias de Itens de Venda a partir de um retorno da Api de Integração
     *
     * @param Empresa $empresa
     * @param string $driverName
     * @param array $vendaApi
     * @return array<VendaItem>
     */
    protected function hydrateItensServicoFromApi(Empresa $empresa, string $driverName, array $vendaApi) : array
    {
        $itens = [];
        foreach ($vendaApi['servicos'] as $servico) {
            if ($vendaApi['venda']['tipo_documento'] == SpedService::DOCTYPE_NFSE) {
                $servicoIntegracao = ServicoIntegracao::where('driver_id', $servico['driver_id'])->first();

                throw_if($servicoIntegracao == null, new ServicoNaoSincronizadoException(
                    'Servico com id ' . $servico['driver_id'] . ' na ' . $driverName . ' não encontrado em nossa base, é necessário importar'));

                $item = new VendaItem();
                $item->item_id = $servicoIntegracao->servico->id;
            }

            $item->tipo_documento = $vendaApi['venda']['tipo_documento'];
            $item->qtde = $servico['qtde'];
            $item->valor = $servico['valor'];

            $itens[] = $item;
        }

        return $itens;
    }

    /**
     * Executa a importação das vendas de cada empresa ativa e cada integração ativa, a partir da última data de importação
     * executada para a integração ou pela data de início configurada
     *
     * @return void
     * @throws \Throwable
     */
    public function syncAllCompaniesFromPlatforms()
    {
        $empresas = Empresa::isAtivo()->get();

        $empresas->each(function($empresa) {
            $empresa->integracoes()->isAtivo()->each(function ($integracao) use ($empresa) {
                try {
                    $fromDate = ($integracao->vendas_importadas_em) ? $integracao->vendas_importadas_em->format('Y-m-d')
                        : $integracao->data_inicio->format('Y-m-d');
                    $this->syncFromPlatform($empresa, $integracao->driver, $fromDate);
                } catch (\Exception $exception) {
                    $empresa->owner->notify(new ErroAoSincronizarVendasEmpresa($empresa, $integracao->driver, 'Um erro ao conectar com a integração para importar as vendas.'));
                    Log::error('ERRO AO IMPORTAR VENDAS - ' . $empresa->nome . ' - ' . $integracao->driver);
                    Log::error($exception);
                }
            });
        });
    }

    /**
     * Chama a criação da NFSe e solicita sua emissão para o service correto
     *
     * @param Venda $venda
     * @return Venda
     */
    public function gerarEmitirNFSe(Venda $venda) : Venda
    {
        $nfseService = new NFSeService();

        $nfseItens = $venda->itens->map(function($item) {
            return new NFSeItemServico([
                'servico_id'        => $item->item_id,
                'qtde'              => $item->qtde,
                'valor'             => $item->valor,
            ]);
        });

        /**
         * Ao criar a NFSe pelo service um evento é disparado e o listener cria um job para emitir no drive sped correto
         */
        $nfse = $nfseService->create([
            'venda_id'      => $venda->id,
            'emitido_em'    => now(),
            'valor'         => $venda->valor,
            'info_adicional'=> $venda->info_adicional,
            'desconto'      => $venda->desconto,
        ], $nfseItens->all());

        if ($nfse == null) {
            $venda->empresa->owner->notify(new ErroAoGerarEmitirNF($venda->empresa, $venda, 'Um erro ocorreu ao emitir a NFSe para venda ' . $venda->id));
            return $venda;
        }

        $venda->documento_id = $nfse->id;
        $venda->save();

        return $venda;
    }

    /**
     * Verifica as vendas da empresa, emitindo as NF de acordo com o tipo de documento e a data planejada para emissão
     *
     * @param Empresa $empresa
     * @return void
     */
    public function gerarEmitirNFsPlanejadas(Empresa $empresa)
    {
        $vendas = $empresa->vendas()
            ->where('data_emissao_planejada', '<=', now())
            ->whereNull('documento_id')
            ->get();

        $vendas->each(function ($venda) {
            if ($venda->tipo_documento == SpedService::DOCTYPE_NFSE) {
                $this->gerarEmitirNFSe($venda);
            }
        });
    }

    /**
     * Percorre cada empresa ativa, as vendas que não foram emitidas NF, gera e emite de acordo com a data planejada
     *
     * @return void
     */
    public function gerarEmitirAllCompaniesNFs()
    {
        $empresas = Empresa::isAtivo()->get();

        $empresas->each(function($empresa) {
            $this->gerarEmitirNFsPlanejadas($empresa);
        });
    }
}
