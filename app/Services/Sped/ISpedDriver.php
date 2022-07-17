<?php

namespace App\Services\Sped;

use App\Models\Empresa;
use App\Models\NFSe;

interface ISpedDriver
{
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
