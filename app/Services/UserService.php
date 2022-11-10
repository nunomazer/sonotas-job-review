<?php

namespace App\Services;

use App\Models\Cidade;
use App\Models\TipoLogradouro;
use Illuminate\Support\Str;

class UserService
{
    /**
     * Resolve o id da cidade pelo nome ou retorna o id da cidade default. Se não encontrar nenhuma retorna 1
     *
     * @param string $nomeCidade
     * @param string $default
     * @return string
     */
    public function resolveIdPeloNome(?string $nomeCidade, string $default = 'São Paulo') : int
    {
        $cidade = Cidade::where('name', $nomeCidade)->first();

        if ($cidade) return $cidade->id;

        $cidade = Cidade::where('name', $default)->first();

        if ($cidade) return $cidade->id;

        return 1;
    }
}
