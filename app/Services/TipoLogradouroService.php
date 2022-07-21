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
     * @param string $logradouro
     * @param string $default
     * @return string
     */
    public function validoOuResolve(string $tipo, string $logradouro, string $default = 'Rua') : string
    {
       if (in_array(Str::lower($tipo), Str::lower(TipoLogradouro::tipos)) === false) {
           return $this->resolvePeloLogradouro($logradouro, $default);
       }

       return $tipo;
    }

    /**
     * Resolve o tipo do logradouro pelo endereço passado, caso não consiga devolve o valor padrão do segundo parâmetro.
     *
     * @param string $logradouro
     * @param string $default
     * @return string
     */
    public function resolvePeloLogradouro(?string $logradouro, string $default = 'Rua') : string
    {
        foreach (TipoLogradouro::tipos as $tipo) {
            if (Str::contains(Str::lower($logradouro), Str::lower($tipo))) {
                return $tipo;
            }
        }

        return $default;
    }
}
