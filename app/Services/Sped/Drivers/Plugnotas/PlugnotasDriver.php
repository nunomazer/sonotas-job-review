<?php

namespace App\Services\Sped\Drivers\Plugnotas;

use App\Services\Sped\ISpedCertificado;
use App\Services\Sped\ISpedDriver;
use App\Services\Sped\ISpedEmpresa;

class PlugnotasDriver implements ISpedDriver
{

    public function certificado(): ISpedCertificado
    {
        return new PlugnotasCertificado();
    }

    public function empresa(): ISpedEmpresa
    {
        return new PlugnotasEmpresa();
    }
}
