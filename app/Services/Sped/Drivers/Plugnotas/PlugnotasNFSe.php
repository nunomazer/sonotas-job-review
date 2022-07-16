<?php

namespace App\Services\Sped\Drivers\Plugnotas;

use App\Models\Cliente;
use App\Models\Empresa;
use App\Services\Sped\ISpedEmpresa;
use App\Services\Sped\ISpedNFSe;
use App\Services\Sped\RegimesTributarios;
use App\Services\Sped\Sped;

class PlugnotasNFSe implements ISpedNFSe
{
    use PlugnotasTrait;

    public function emitir(Empresa $empresa): string
    {
        try {
            $result = $this->httpClient()->request('POST', 'empresa', [
                'json' => $this->montaArrayCadastro($empresa)
            ]);
        } catch (\Exception $exception) {
            dd($exception->getCode());
        }
        dd($result->getBody()->getContents());
    }

    public function alterarEmpresa(Empresa $empresa): string
    {
        try {
            $result = $this->httpClient()->request('PATCH', 'empresa/'.$empresa->documento, [
                'json' => $this->montaArrayCadastro($empresa)
            ]);
        } catch (\Exception $exception) {
            dd($exception->getCode());
        }
        dd($result->getBody()->getContents());
    }

}
