<?php

namespace App\Services\Integra;

use App\Services\Integra\Drivers\Eduzz\EduzzPlatform;
use Illuminate\Support\Str;

class IntegraService
{
    protected $platforms = [
        EduzzPlatform::class,
    ];

    /**
     * Retorna um array com o nome (namespace completo) das classes dos drivers de plataformas, para poder acessar
     * dados de $name e $fields
     *
     * @return string[]
     */
    public function platformsDriverClasses() : array
    {
        return $this->platforms;
    }

    /**
     * Retorna a plataforma pelo seu nome
     *
     * @param string $platform
     * @param array $config Array com os dados de configuração do cliente (conta da plataforma)
     * @return Platform
     * @throws \Exception
     */
    public function driver(string $platform, array $config) : Platform
    {
        foreach ($this->platforms as $p) {
            if (Str::lower($p::$name) == Str::lower($platform)) return new $p($config);
        }

        throw new \Exception("Plataforma de integração {$p} não encontrada");
    }

    /**
     * Carrega as rotas de cada driver, neste ponto os drivers devem especificar rotas de redirect, webhook
     *
     * @return void
     */
    public function routes()
    {
        foreach ($this->platforms as $p) { // TODO cache, cuidar da implantação de novos drivers para limpar cache
            if (method_exists($p, 'routes')) {
                $driver = new $p([]);
                $driver->routes();
            }
        }
    }
}
