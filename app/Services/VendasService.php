<?php

namespace App\Services;

use App\Events\NFSeCriadaEvent;
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
    public function create(array $venda, array $itens) : ? NFSe
    {
        try {
            DB::beginTransaction();

                $venda = Venda::create($venda);

                if ($venda->data_emissao_planejada == null) {
                    /**
                     * Definição da data a ser emitido doc fiscal, hoje somente empresa_integrações tem informações
                     * para este cálculo
                     */
                    if ($venda->driver) {
                        $venda->data_emissao_planejada = $this->calculoDataPlanejadaEmissao($venda);
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

    public function calculoDataPlanejadaEmissao(Venda $venda) : Carbon
    {
        $integracao = Integracao::where('empresa_id', $venda->empresa_id)
            ->where('driver', $venda->driver)
            ->where('tipo_documento', $venda->tipo_documento)
            ->get();

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
     * @return array Vendas importadas e sincronizados da api de integração, já salvos no banco de dados
     */
    public function syncFromPlatform(Empresa $empresa, string $driverName, $from) : array
    {
        $driver = (new EmpresaService())->driverIntegracao($empresa, $driverName);

        $vendasApi = $driver->getVendas($from);

        $vendas = [];
        DB::transaction(function () use ($driverName, $empresa, $vendasApi, &$vendas) {
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
                    $itensServico = $this->hydrateItensServicoFromApi($empresa, $driverName, $vendaApi);
                    $vendas[] = $this->create($venda->toArray(), $itensServico);
                }
            }
        });

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
    protected function hydrateVendaFromApi(Empresa $empresa, string $driverName, array $vendaApi) : Venda
    {
        $venda = new Venda();

        $venda->empresa_id = $empresa->id;
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

                throw_if($servicoIntegracao == null, new ServicoNaoSincronizadoException('Servico com id ' . $servico['driver_id'] . ' na ' . $driverName . ' não encontrado em nossa base, é necessário importar'));

                $item = new VendaItem();
                $item->item_id = $servicoIntegracao->servico->id;
            }

            $item->qtde = $servico['qtde'];
            $item->valor = $servico['valor'];

            $itens[] = $item;
        }

        return $itens;
    }
}
