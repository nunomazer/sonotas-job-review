<?php

namespace App\Services\Sped\Drivers\Plugnotas;

use GuzzleHttp\Client;

trait PlugnotasTrait
{
    public function httpClient(): Client
    {
        return new \GuzzleHttp\Client([
            'base_uri' => config('sped.drivers.plugnotas.base_url'),
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'X-API-KEY' => config('sped.drivers.plugnotas.token'),
            ],
        ]);
    }
}
