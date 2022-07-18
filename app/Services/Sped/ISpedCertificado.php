<?php

namespace App\Services\Sped;

use App\Models\Certificado;

interface ISpedCertificado
{
    /**
     * Cadastra um certificado novo na plataforma de notas. Espera receber um identificador do certificado da plataforma
     * para gravar no banco interno.
     *
     * @param Certificado $certificado
     * @return string
     */
    public function cadastrar(Certificado $certificado): string;
}
