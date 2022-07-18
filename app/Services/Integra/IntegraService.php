<?php

namespace App\Services\Integra;

use App\Services\Integra\Drivers\Eduzz\EduzzPlatform;
use Illuminate\Support\Str;

class IntegraService
{
    protected $platforms = [
        EduzzPlatform::class,
    ];

    public function platforms() : array
    {
        return $this->platforms;
    }

    /**
     * Retorna a plataforma pelo seu nome
     *
     * @param string $platform
     * @return Platform
     * @throws \Exception
     */
    public function driver(string $platform) : Platform
    {
        foreach ($this->platforms as $p) {
            if (Str::lower($p::$name) == Str::lower($platform)) return new $p();
        }

        throw new \Exception("Plataforma de integração {$p} não encontrada");
    }
}
