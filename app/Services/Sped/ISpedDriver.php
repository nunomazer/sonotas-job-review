<?php

namespace App\Services\Sped;

use App\Models\Empresa;

interface ISpedDriver
{
    //public function getDriver(): ISpedDriver;
    public function certificado() : ISpedCertificado;
    public function empresaDriver(Empresa $empresa) : ISpedEmpresa;
    public function nfse() : ISpedNFSe;
}
