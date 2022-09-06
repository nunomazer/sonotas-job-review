<?php

namespace App\Services\Sped\Drivers\Plugnotas;

use App\Models\Empresa;
use App\Models\NFSe;
use App\Services\Sped\ISpedCertificado;
use App\Services\Sped\ISpedDriver;
use App\Services\Sped\ISpedEmpresa;
use App\Services\Sped\ISpedNFSe;

class PlugnotasDriver implements ISpedDriver
{
    public function nome(): string
    {
        return 'plugnotas';
    }

    public function certificado(): ISpedCertificado
    {
        return new PlugnotasCertificado();
    }

    public function empresaDriver(Empresa $empresa): ISpedEmpresa
    {
        return new PlugnotasEmpresa($empresa);
    }

    public function nfseDriver(NFSe $nfse): ISpedNFSe
    {
        return new PlugnotasNFSe($nfse);
    }

    public function cadastrarWebhook()
    {
        return (new PlugnotasWebhook())->cadastrar();
    }
}
