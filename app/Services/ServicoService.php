<?php

namespace App\Services;

use App\Models\Empresa;
use App\Models\EmpresaNFSConfig;
use App\Models\Servico;
use App\Models\ServicoIntegracao;
use App\Services\Integra\IntegraService;
use App\Services\Integra\Platform;
use App\Services\Sped\SpedService;
use Illuminate\Support\Facades\DB;

class ServicoService
{
    /**
     * Cria um novo registro de serviço no banco de dados
     * @param array $servico
     * @return Empresa
     */
    public function create(array $servico) : Servico
    {
        // cria com os campos padrão do cabeçalho de configuração da NFSe da empresa
        // o merge considera os novos, então sobrepõe com o que está vindo, se estiver vindo um campo pelo parâmetro
        // que já exista no template

        $config = EmpresaNFSConfig::where('empresa_id', $servico['empresa_id'])
                            ->first();
        if($config == null){
            $config = [];
        }
        $config = $config->makeHidden(['id', 'created_at', 'updated_at', 'deleted_at']) ?? [];

        $servico = Servico::create(array_merge(
            $config->toArray() ?? [],
            $servico
        ));

        return $servico;
    }

    /**
     * Altera o registro de serviço no banco de dados
     * @param $servico
     * @return Empresa
     */
    public function update(Servico $servico) : Servico
    {
        $servico->save();

        return $servico;
    }

    /**
     * Sincroniza os serviços importando da plataforma de integração e salvando novos ou alterando os existentes
     * pelo driver id no banco de dados.
     *
     * @param Empresa $empresa Empresa para a qual o sync de serviços deve ser realizado
     * @param string $driver Nome do driver de plataforma para sincronizar
     * @return array Serviços importados e sincronizados da api de integração, já salvos no banco de dados
     */
    public function syncFromPlatform(Empresa $empresa, string $driverName) : array
    {
        $driver = (new EmpresaService())->driverIntegracao($empresa, $driverName);

        $servicosApi = $driver->getServicos();

        $servicos = [];
        DB::transaction(function () use ($driverName, $empresa, $servicosApi, &$servicos) {
            foreach ($servicosApi as $servicoApi) {
                $servicoIntegracao = ServicoIntegracao
                    ::where('driver', $driverName)
                    ->where('driver_id', $servicoApi['driver_id'])
                    ->first();

                if ($servicoIntegracao == null) {
                    $servico = new Servico();
                } else {
                    $servico = $servicoIntegracao->servico;
                }

                $servico->empresa_id = $empresa->id;
                $servico->nome = $servicoApi['nome'];
                $servico->descricao = $servicoApi['descricao'];
                $servico->valor = $servicoApi['valor'];
                $servico->save();

                if ($servicoIntegracao == null) {
                    $servicoIntegracao = new ServicoIntegracao();
                }

                $servicoIntegracao->servico_id = $servico->id;
                $servicoIntegracao->driver = $driverName;
                $servicoIntegracao->driver_id = $servicoApi['driver_id'];
                $servicoIntegracao->driver_dados = $servicoApi['driver_dados'];
                $servicoIntegracao->save();

                $servicos[] = $servico;
            }
        });

        return $servicos;
    }

    /**
     * Resolve e retorna uma instância para o driver da plataforma de integração de um serviço específico.
     *
     * @param ServicoIntegracao $servicoIntegracao Objeto model de relacionamento com as informações de integração do serviço, não é o model do serviço
     * @return Platform
     */
    public function driver(ServicoIntegracao $servicoIntegracao) : Platform
    {
        $integra = new IntegraService();

        return $integra->driver(
            $servicoIntegracao->integracao->driver,
            $servicoIntegracao->servico->empresa->integracoes->where('driver', $this->driver)->fields
        );
    }
}
