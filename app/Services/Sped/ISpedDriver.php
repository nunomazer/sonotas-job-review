<?php

namespace App\Services\Sped;

use App\Models\Empresa;
use App\Models\NFSe;

interface ISpedDriver
{
    /**
     * Retorna o nome do driver, ele é usado para instanciar o driver quando necessário e também para gravar esta informação
     * junto ao registro do documento fiscal
     *
     * @return string
     */
    public function nome() : string;

    /**
     * Cadastra no driver o Webhook geral
     * @return mixed
     */
    public function cadastrarWebhook();

    //public function getDriver(): ISpedDriver;
    public function certificado() : ISpedCertificado;

    /**
     * Retorna uma instância concreta do driver de Sped Empresa
     * @param Empresa $empresa
     * @return ISpedEmpresa
     */
    public function empresaDriver(Empresa $empresa) : ISpedEmpresa;

    /**
     * Retorna uma instância concreta do driver de Sped NFSe
     *
     * @param NFSe $nfse
     * @return ISpedNFSe
     */
    public function nfseDriver(NFSe $nfse) : ISpedNFSe;
}
