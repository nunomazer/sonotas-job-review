<?php

namespace App\Services\Integra\Drivers\Eduzz;

use App\Models\Servico;
use App\Services\Integra\IIntegraDriver;
use App\Services\Integra\Platform;
use Carbon\Carbon;
use GuzzleHttp\Client;

class EduzzPlatform extends Platform implements IIntegraDriver
{
    public static $name = 'Eduzz';

    public static array $fields = [
        [
            'name' => 'publickey',
            'label' => 'Public Key',
            'required' => true,
        ],
        [
            'name' => 'apikey',
            'label' => 'Api Key',
            'required' => true,
        ],
        [
            'name' => 'email',
            'label' => 'E-mail',
            'required' => true,
        ],
    ];

    protected $token = null;

    /**
     * @var Carbon
     */
    protected $token_until = null;

    protected function getApiQueryParams() : array
    {
        return [
            'email' => $this->config['email'],
            'publickey' => $this->config['publickey'],
            'apikey' => $this->config['apikey'],
        ];
    }

    private function setTokensFromResult($result)
    {
        if (isset($result['data']['token'])) {
            $this->token = $result['data']['token'];
            $this->token_until = Carbon::parse($result['data']['token_valid_until']);
        }

        if (isset($result['profile']['token'])) {
            $this->token = $result['profile']['token'];
            $this->token_until = Carbon::parse($result['profile']['token_valid_until']);
        }

        return $this->token;
    }

    private function generateToken() : string
    {
        $http = new \GuzzleHttp\Client([
            'base_uri' => config('integra.drivers.eduzz.base_url'),
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
        ]);

        $result = $http->post('/credential/generate_token',[
            'query' => $this->getApiQueryParams(),
        ]);

        $result = json_decode($result->getBody()->getContents(), true);

        return $this->setTokensFromResult($result);
    }
    /**
     * Pega o token de acesso ou gera um novo caso tenha expirao ou não exista
     * @return string
     */
    protected function getToken() : string
    {
        if (!$this->token || $this->token_until->lessThan(now())) {
            $this->generateToken();
        }

        return $this->token;
    }

    /**
     * Resolve o cliente http com a uri base do eduzz e o token
     * de segurança no cabeçalho, caso não tenha um token ele gera
     * @return Client
     */
    public function httpClient(): Client
    {
        return new \GuzzleHttp\Client([
            'base_uri' => config('integra.drivers.eduzz.base_url'),
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'token' => $this->getToken(),
            ],
        ]);
    }

    private function callContentList($page = null) : array
    {
        $http = $this->httpClient();

        $query = $this->getApiQueryParams();
        if ($page) $query['page'] = $page;

        $result = $http->get('/content/content_list', [
            'query' => $query,
        ]);

        $result = json_decode($result->getBody()->getContents());

        return $result;
    }

    public function getServicos(): array
    {
        $result = $this->callContentList();

        $paginator = $result['paginator'];
        $page = 1;
        $servicos = [];
        while ($page <= $paginator['totalPages']) {
            $servicosApi = $result['data'];

            foreach ($servicosApi as $servicoApi) {
                $servicos[] = [
                    'driver_id' => $servicoApi['content_id'],
                    'nome' => $servicoApi['title'],
                    'descricao' => $servicoApi['description'],
                    'valor' => $servicoApi['price'],
                ];
            }

            $page++;
        }

        return $servicos;
    }
}
