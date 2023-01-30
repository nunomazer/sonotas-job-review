<?php

namespace App\Services\MoneyFlow\Drivers\Eduzz;


/**
 * Trait com funções base de auxílio às classes do driver Eduzz de Assinatura
 *
 * Todas as classes MoneyFlow do Eduzz devem usar esta trait para padronização de chamadas e retornos
 */
trait EduzzTrait
{
    /**
     * Resolve o cliente http com a uri base do safe2pay e o token
     * de segurança no cabeçalho
     * @return Client
     */
    public function httpClient(): Client
    {
//        $apiSubDomain = $this->api_sub_domain ?? 'api';
//
//        $baseUri = 'https://' . $apiSubDomain . '.' . config('moneyflow.drivers.safe2pay.base_url');
//
//        $envToken = (isset($this->has_sandbox) && $this->has_sandbox) ? 'sandbox' : 'production';
//
//        $token = config('moneyflow.drivers.safe2pay.api_token_'.$envToken);
//
//        return new \GuzzleHttp\Client([
//            'base_uri' => $baseUri,
//            'headers' => [
//                'Content-Type' => 'application/json',
//                'Accept' => 'application/json',
//                'X-API-KEY' => $token,
//            ],
//        ]);
    }

}
