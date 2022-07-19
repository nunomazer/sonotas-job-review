<?php

namespace App\Services;

use App\Events\EmpresaAlteradaEvent;
use App\Events\EmpresaCriadaEvent;
use App\Models\Empresa;
use App\Models\Servico;
use App\Services\Integra\IntegraService;
use App\Services\Sped\SpedService;

class ServicoService
{
    /**
     * Cria um novo registro de empresa no banco de dados
     * @param $empresa
     * @return Empresa
     */
    public function create($empresa) : Empresa
    {
        $empresa = Empresa::create($empresa);

        EmpresaCriadaEvent::dispatch($empresa);

        return $empresa;
    }

    /**
     * Altera o registro de empresa no banco de dados
     * @param $empresa
     * @return Empresa
     */
    public function update(Empresa $empresa) : Empresa
    {
        $empresa->save();

        EmpresaAlteradaEvent::dispatch($empresa);

        return $empresa;
    }

    /**
     * Cadastra a empresa nos serviços Sped para cada tipo de documento e cidade
     *
     * @param Empresa $empresa
     * @return void
     */
    public function cadastrarSped(Empresa $empresa)
    {
        $sped = new SpedService(SpedService::DOCTYPE_NFSE, $empresa->cidade->name);
        $driverNFSe = $sped->empresaDriver($empresa);
        $driverNFSe->cadastrar();
    }

    /**
     * Altera a empresa nos serviços Sped para cada tipo de documento e cidade
     *
     * @param Empresa $empresa
     * @return void
     */
    public function alterarSped(Empresa $empresa)
    {
        $sped = new SpedService(SpedService::DOCTYPE_NFSE, $empresa->cidade->name);
        $driverNFSe = $sped->empresaDriver($empresa);
        $driverNFSe->alterar();
    }

    /**
     * Sincroniza os serviços importando da plataforma de integração e salvando novos ou alterando os existentes
     * pelo driver id no banco de dados.
     *
     * @param string $driver Nome do driver a ser utilizado
     * @param array $config Configuração de conexão do usuário para integração
     * @return array Serviços importados e sincronizados da api de integração, já salvos no banco de dados
     */
    public function syncFromPlatform($driver, array $config) : array
    {
        $integra = new IntegraService();
        $driver = $integra->driver($driver, $config);

        $servicosApi = $driver->getServicos();

        $servicos = [];
        foreach ($servicosApi as $servicoApi) {
            $servico = Servico::where('driver_api', $servicosApi['driver_id'])->first();

            if ($servico == null) {
                $servico = new Servico();
            }

            $servico->driver = $driver->name();
            $servico->driver_api = $servicoApi['driver_api'];
            $servico->nome = $servicoApi['nome'];
            $servico->descricao = $servicoApi['descricao'];
            $servico->valor = $servicoApi['valor'];

            $servico->save();
        }

        return $servicos;
    }
}
