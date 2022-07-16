<?php

namespace App\Services;

use App\Events\EmpresaAlteradaEvent;
use App\Events\EmpresaCriadaEvent;
use App\Models\Empresa;
use App\Services\Sped\SpedService;

class EmpresaService
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
        $driverNFSe = $sped->empresa($empresa);
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
        $driverNFSe = $sped->empresa($empresa);
        $driverNFSe->alterar();
    }
}
