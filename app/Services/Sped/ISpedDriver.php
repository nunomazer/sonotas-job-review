<?php

namespace App\Services\Sped;

interface ISpedDriver
{
    //public function getDriver(): ISpedDriver;
    public function certificado() : ISpedCertificado;
    public function empresa() : ISpedEmpresa;
}
