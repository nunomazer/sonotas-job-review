<?php

namespace App\Services;

use App\Models\TipoLogradouro;
use Illuminate\Support\Str;

class TipoLogradouroService
{

    /**
     * Resolve o tipo do logradouro pelo endereço passado, caso não consiga devolve o valor padrão do segundo parâmetro.
     *
     * @param string $endereco
     * @param string $default
     * @return string
     */
    public function resolvePeloEndereco(string $endereco, string $default = 'Rua') : string
    {
        foreach (TipoLogradouro::tipos as $tipo) {
            if (Str::contains(Str::lower($endereco), Str::lower($tipo))) {
                return $tipo;
            }
        }

        return $default;
    }
}
