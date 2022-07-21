<?php

namespace App\Services;

use App\Events\NFSeCriadaEvent;
use App\Models\Cliente;
use App\Models\Empresa;
use App\Models\NFSe;
use App\Models\NFSeItemServico;
use App\Models\Servico;
use App\Models\ServicoIntegracao;
use App\Services\Sped\SpedService;
use App\Services\Sped\Status;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class NFSeService
{
    /**
     * Envia um objeto de memória de NFSe model, ou um array com os dados de criação de uma NFSe,
     * e um array com objetos (ou array de dados) de itens de serviço das NFSe, para que o service
     * grave no banco de dados e dispare os eventos de emissão de notas na api e demais fluxos necessários
     *
     * @param array $nfse
     * @param array<array|NFSeItemServico> $itensServico
     * @return NFSe|null
     */
    public function create(array $nfse, array $itensServico) : ? NFSe
    {
        try {
            DB::beginTransaction();

                $nfse['status'] = Status::PENDENTE;
                $nfse['status_historico'] = $this->addStatusDados(null, Status::PENDENTE, ['message' => 'Registro criado no banco de dados']);

                $nfse = NFSe::create($nfse);

                $nfse->itens_servico()->saveMany($itensServico);

            DB::commit();

            NFSeCriadaEvent::dispatch($nfse);

            return $nfse;

        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Erros ao gravar a NFSe');
            Log::error($exception);

            return null;
        }
    }

    public function emitirSped(NFSe $nfse) : NFSe
    {
        try {
            $sped = new SpedService(SpedService::DOCTYPE_NFSE, $nfse->empresa->cidade->name);
            $driverNFSe = $sped->nfseDriver($nfse);
            $result = $driverNFSe->emitir();

            $nfse->driver = $sped->driver()->nome();

            throw_if($result->code > 300, 'Erro no retorno da API Plugnotas: ' . $result->message);

            $nfse->status = Status::PROCESSAMENTO;
            $nfse->driver_id = $result->objects[0]['idApi'];
            $nfse->status_historico = $this->addStatusDados($nfse, $nfse->status, $result->toArray());
            $nfse->save();

        } catch (\Exception $exception) {
            $nfse->status = Status::ERRO;
            $nfse->status_historico = $this->addStatusDados($nfse, Status::ERRO, ['message' => 'Exception: ' . $exception->getMessage()]);
            $nfse->save();

            Log::error($exception);
        }

        return $nfse;
    }

    /**
     * Adiciona dados no histórico de status, ATENÇÃO, não salva o registro apenas monta corretamente o valor
     * que deve substituir o campo status_historico
     *
     * @param NFSe $nfse
     * @param string $status Status de acordo com os status permitidos
     * @param array $dados Dados que devem ser inseridos como conteúdo do histórico
     * @return void
     */
    public function addStatusDados(?NFSe $nfse, string $status, array $dados) : array
    {
        $historico = ($nfse) ? $nfse->status_historico : [];
        $historico[$status] = array_merge(['created_at' => now()->format('Y-m-d H:i:s')], $dados);
        return $historico;
    }

    /**
     * Sincroniza as vendas importando da plataforma de integração e salvando novas NFSe
     * pelo driver id no banco de dados.
     *
     * @param Empresa $empresa Empresa para a qual o sync de serviços deve ser realizado
     * @param string $driver Nome do driver de plataforma para sincronizar
     * @return array NFSe importadas e sincronizados da api de integração, já salvos no banco de dados
     */
    public function syncFromPlatform(Empresa $empresa, string $driverName, $from) : array
    {
        $driver = (new EmpresaService())->driverIntegracao($empresa, $driverName);

        $vendasApi = $driver->getVendas($from);

        $vendas = [];
        DB::transaction(function () use ($driverName, $empresa, $vendasApi, &$vendas) {
            foreach ($vendasApi as $vendaApi) {
                $nfse = NFSe
                    ::where('driver', $driverName)
                    ->where('driver_id', $vendaApi['driver_id'])
                    ->first();

                /**
                 * Somente inserção de novas vendas vindas da Api que ainda não foram criadas como NFSe do nosso lado
                 */
                if ($nfse == null) {
                    $nfse = $this->hydrateNFSeFromApi($empresa, $driverName, $vendaApi);
                    $itensServico = $this->hydrateItensServicoFromApi($empresa, $driverName, $vendaApi);
                    $vendas[] = $this->create($nfse, $itensServico);
                }
            }
        });

        return $vendas;
    }

    /**
     * Monta uma instância de NFSe a partir de um retorno da Api de Integração
     *
     * @param Empresa $empresa
     * @param string $driverName
     * @param array $vendaApi
     * @return NFSe
     */
    protected function hydrateNFSeFromApi(Empresa $empresa, string $driverName, array $vendaApi) : NFSe
    {
        $nfse = new NFSe();

        $nfse->empresa_id = $empresa->id;
        $nfse->emitido_em = $vendaApi['data_emissao'];
        $nfse->valor = $vendaApi['valor'];

        $nfse->driver = $driverName;
        $nfse->driver_id = $vendaApi['driver_id'];
        $nfse->driver_dados = $vendaApi['driver_dados'];

        $cliente = Cliente::getByDoc($vendaApi['cliente']['documento']);

        if ($cliente == null) {
            $cliente = (new ClienteService())->create($vendaApi);
        }

        $nfse->cliente_id;

        return $nfse;
    }

    /**
     * Monta um array com instâncias de Itens de servico de NFSe a partir de um retorno da Api de Integração
     *
     * @param Empresa $empresa
     * @param string $driverName
     * @param array $vendaApi
     * @return array<NFSeItemServico>
     */
    protected function hydrateItensServicoFromApi(Empresa $empresa, string $driverName, array $vendaApi) : array
    {
        $itensServico = [];
        foreach ($vendaApi['servicos'] as $servico) {
            $servicoIntegracao = ServicoIntegracao::where('driver_id', $servico['driver_id'])->first();

            throw_if($servicoIntegracao == null, 'Servico com id ' . $servico['driver_id'] . ' na ' . $driverName . ' não encontrado em nossa base, é necessário importar');

            $itemServico = new NFSeItemServico();
            $itemServico->servico_id = $servicoIntegracao->servico->id;

            $itensServico[] = $itemServico;
        }

        return $itensServico;
    }
}
