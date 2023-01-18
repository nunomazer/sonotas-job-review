<?php

namespace App\Services\Sped\Drivers\Plugnotas;

use App\Services\Sped\SpedApiReturn;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use Illuminate\Support\Str;
use Psr\Http\Message\ResponseInterface;

/**
 * Trait com funções base de auxílio às classes do driver Plugnotas
 *
 * Todas as classes Sped do Plugnotas devem usar esta trait para padronização de chamadas e retornos
 */
trait PlugnotasTrait
{
    /**
     * Resolve o cliente http com a uri base do plugnotas e o token
     * de segurança no cabeçalho
     * @return Client
     */
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

    /**
     * Monta corretamente o retorno padronizado da API para o core consumidor da aplicação, de acordo com os
     * contratos da classe genérica de retorno de apis SpedApiReturn
     *
     * @param ResponseInterface|\Exception $result recebe o objeto a ser transformado no retorno padrão
     * @return SpedApiReturn retorno padrão da facade Sped
     */
    public function toApiReturn($result) : SpedApiReturn
    {
        $apiReturn = new SpedApiReturn();

        if ($result instanceof ResponseInterface) {
            $apiReturn->code = $result->getStatusCode();
            $content = json_decode($result->getBody()->getContents(), true);
        }

        if ($result instanceof \Exception) {
            $apiReturn->code = $result->getCode();

            if ($result instanceof BadResponseException) {
                $content = json_decode($result->getResponse()->getBody()->getContents(), true);
                $apiReturn->error = true;
                $content = $content['error'];
            } else {
                throw $result;
            }
        }

        $apiReturn->message = is_array($content) ? $content['message'] : $content;

        $apiReturn->data = isset($content['data']) ? $content['data'] : [];

        $apiReturn->protocol = isset($content['protocol']) ? $content['protocol'] : null;

        $objs = isset($content['documents']) ? $content['documents'] : [];
        foreach ($objs as $obj) {
            $apiReturn->objects[] = [
                'idSoNotas' => $obj['idIntegracao'],
                'documento' => $obj['prestador'],
                'idApi' => $obj['id'],
            ];
        }

        return $apiReturn;
    }

}
