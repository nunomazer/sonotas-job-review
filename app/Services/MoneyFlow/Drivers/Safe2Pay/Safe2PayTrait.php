<?php

namespace App\Services\MoneyFlow\Drivers\Safe2Pay;

use App\Services\Sped\SpedApiReturn;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use Illuminate\Support\Str;
use Psr\Http\Message\ResponseInterface;

/**
 * Trait com funções base de auxílio às classes do driver Safe2Pay
 *
 * Todas as classes MoneyFlow do Safe2Pay devem usar esta trait para padronização de chamadas e retornos
 */
trait Safe2PayTrait
{
    /**
     * Resolve o cliente http com a uri base do safe2pay e o token
     * de segurança no cabeçalho
     * @return Client
     */
    public function httpClient(): Client
    {
        $apiSubDomain = $this->api_sub_domain ?? 'api';

        $baseUri = 'https://' . $apiSubDomain . '.' . config('moneyflow.drivers.safe2pay.base_url');

        return new \GuzzleHttp\Client([
            'base_uri' => $baseUri,
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'X-API-KEY' => config('moneyflow.drivers.safe2pay.api_token'),
            ],
        ]);
    }

}
