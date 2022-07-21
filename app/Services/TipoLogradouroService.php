<?php

namespace App\Services;

use App\Models\TipoLogradouro;
use Illuminate\Support\Str;

class TipoLogradouroService
{

    /**
     * Valida um tipo de logradouro, caso não seja válido resolve para um dos tipos pelo endereço informado, ou retorna o valor padrão.
     *
     * @param string $tipo
     * @param string $endereco
     * @param string $default
     * @return string
     */
    public function validoOuResolve(string $tipo, string $endereco, string $default = 'Rua') : string
    {
       if (in_array(Str::lower($tipo), Str::lower(TipoLogradouro::tipos)) === false) {
           return $this->resolvePeloEndereco($endereco, $default);
       }

       return $tipo;
    }

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
