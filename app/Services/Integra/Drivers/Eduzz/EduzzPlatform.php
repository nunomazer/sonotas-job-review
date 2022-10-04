<?php

namespace App\Services\Integra\Drivers\Eduzz;

use App\Models\Servico;
use App\Services\CidadeService;
use App\Services\Integra\IIntegraDriver;
use App\Services\Integra\Platform;
use App\Services\Sped\SpedService;
use App\Services\TipoLogradouroService;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Support\Str;

class EduzzPlatform extends Platform implements IIntegraDriver
{
    public static $name = 'Eduzz';

    public static array $fields = [
        [
            'name' => 'publickey',
            'label' => 'Public Key',
            'required' => true,
            'visible' => true,
            'helptext' => 'Chave pública de vínculo da plataforma',
        ],
        [
            'name' => 'apikey',
            'label' => 'Api Key',
            'required' => true,
            'visible' => true,
            'helptext' => 'Chave da API de vínculo da plataforma',
        ],
        [
            'name' => 'email',
            'label' => 'E-mail',
            'required' => true,
            'visible' => true,
            'helptext' => 'E-mail que recebera atualizações referentes a integração',
        ],
        
        [
            'name' => 'oauth_access_token',
            'label' => 'OAUTH Access Token',
            'visible' => false,
            'helptext' => '',
        ],
        [
            'name' => 'oauth_user_id',
            'label' => 'UserID',
            'visible' => false,
            'helptext' => '',
        ],
    ];

    //protected $token = null;

    /**
     * @var Carbon
     */
    //protected $token_until = null;
    /*
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
    }*/

    /*private function generateToken() : string
    {
        $http = new \GuzzleHttp\Client([
            'base_uri' => config('integra.drivers.eduzz.base_url'),
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
        ]);

        $result = $http->post('/credential/generate_token',[
            'query' => [
                'email' => $this->config['email'],
                'publickey' => $this->config['publickey'],
                'apikey' => $this->config['apikey'],
            ]
        ]);

        $result = json_decode($result->getBody()->getContents(), true);

        return $this->setTokensFromResult($result);
    }*/

    /**
     * Pega o token de acesso ou gera um novo caso tenha expirao ou não exista
     * @return string
     */
    protected function getToken() : string
    {
        return $this->config['access_token'];
        /*
        if (!$this->token || $this->token_until->lessThan(now())) {
            $this->generateToken();
        }

        return $this->token;
        */
    }

    /**
     * Resolve o cliente http com a uri base do eduzz e o token
     * de segurança no cabeçalho, caso não tenha um token ele gera
     * @return Client
     */
    protected function httpClient(): Client
    {
        return new \GuzzleHttp\Client([
            'base_uri' => config('integra.drivers.eduzz.base_url'),
            'headers' => [
                'Content-Type'  => 'application/json',
                'Accept'        => 'application/json',
                'Authorization' => "Bearer {$this->getToken()}",
            ],
        ]);
    }

    /**
     * Chama o endpoint que retorna a lista de conteúdos - os serviços cadastrados na Eduzz
     * @param $page
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    private function callContentList($page = null) : array
    {
        $http = $this->httpClient();

        $query = [];
        if ($page) $query['page'] = $page;

        $result = $http->get('/content/content_list', [
            'query' => $query,
        ]);

        $result = json_decode($result->getBody()->getContents(), true);

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
                    'driver_dados' => $servicoApi,
                ];
            }

            $page++;

            if ($page <= $paginator['totalPages']) {
                $result = $this->callContentList($page);
            }
        }

        return $servicos;
    }

    /**
     * Chama o endpoint que retorna a lista de documentos fiscais - as vendas cadastradas na Eduzz
     *
     * @param $page
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    private function callTaxDocumentList($from, $page = 1) : array
    {
        $http = $this->httpClient();

        $query = [];
        $query['start_date'] = $from;
        if ($page) $query['page'] = $page;

        $result = $http->get('/fiscal/v1', [
            'query' => $query,
        ]);

        $result = json_decode($result->getBody()->getContents(), true);

        return $result;
    }

    public function getVendas(string $from, $page = 1): array
    {
        $from = Str::substr($from, 0, 10);
        $result = $this->callTaxDocumentList($from, $page);

        $vendas = [];

        if (count($result['data']) == 0) return $vendas;

        $paginator = $result['paginator'];
        while ($page <= $paginator['totalPages']) {
            $vendasApi = $result['data'];

            foreach ($vendasApi as $vendaApi) {
                $vendas[] = [
                    'driver_id' => $vendaApi['document_id'],
                    'venda' => [
                        'nome' => $vendaApi['document_name'],
                        'status' => $vendaApi['document_status'],
                        'tipo_documento' => SpedService::DOCTYPE_NFSE, // TODO refatorar quando trabalhar com NFe
                        'valor' => $vendaApi['document_basevalue'],
                        'data_emissao' => $vendaApi['document_emissiondate'],
                        'data_referencia' => $vendaApi['document_referencedate'],
                        'data_processamento' => $vendaApi['document_processingdate'],
                    ],
                    'cliente' => [
                        'nome' => $vendaApi['destination_company_name'],
                        'tipo_pessoa' => $vendaApi['destination_taxtype'],
                        'documento' => $vendaApi['destination_taxid'],
                        'email' => $vendaApi['destination_email'],
                        'tipo_logradouro' => $this->resolveTipoLogradouro($vendaApi),
                        'logradouro' => $vendaApi['destination_street'] ?? '',
                        'numero' => $vendaApi['destination_number'] ?? '',
                        'complemento' => $vendaApi['destination_complement'] ?? '',
                        'bairro' => $vendaApi['destination_district'] ?? '',
                        'cep' => $vendaApi['destination_zipcode'] ?? '',
                        'cidade' => $vendaApi['destination_city'] ?? '',
                        'city_id' => $this->resolveCidadeId($vendaApi),
                        'estado' => $vendaApi['destination_uf'] ?? '',
                        'telefone_ddd' => Str::substr($vendaApi['destination_tel'], 0,2),
                        'telefone_num' => Str::substr($vendaApi['destination_tel'], 2),
                    ],
                    'servicos' => [
                        [
                            'driver_id' => $vendaApi['content_id'],
                            'valor' => $vendaApi['document_basevalue'],
                            'qtde' => 1,
                        ]
                    ],
                    'driver_dados' => $vendaApi,
                ];
            }

            $page++;

            if ($page <= $paginator['totalPages']) {
                $result = $this->callTaxDocumentList($from, $page);
            }
        }

        return $vendas;
    }

    protected function resolveTipoLogradouro(array $venda) : string
    {
        $tipoLogService = new TipoLogradouroService();

        return $tipoLogService->resolvePeloLogradouro($venda['destination_street']);
    }

    protected function resolveCidadeId(array $venda) : int
    {
        $cidadeService = new CidadeService();

        return $cidadeService->resolveIdPeloNome($venda['destination_city'], $venda['source_city'] ?? 'São Paulo');
    }
}
