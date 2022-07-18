<?php

namespace App\Services\Sped\Drivers\Plugnotas;

use App\Models\Certificado;
use App\Services\Sped\ISpedCertificado;

class PlugnotasCertificado implements ISpedCertificado
{
    public function cadastrar(Certificado $certificado): string
    {
         return 'não implementado';
    }
}
