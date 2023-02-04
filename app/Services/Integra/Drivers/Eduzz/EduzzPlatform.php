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
        [
            'name' => 'orbita_id',
            'label' => 'Id Orbita Eduzz',
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
//        return $this->fields['oauth_access_token'];//TODO
//    //REVER

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

        $result = $http->get('/myeduzz-products/v1/products', [
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
                    'driver_id' => $servicoApi['id'],
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

        $result = $http->get('/myeduzz-financial/v1/sales', [
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
            $vendasApi = $result['items'];

            foreach ($vendasApi as $vendaApi) {
                $vendas[] = [
                    'driver_id' => $vendaApi['id'],
                    'venda' => [
                        'nome' => $vendaApi['main_content']['name'],
                        'status' => $vendaApi['status']['name'],
                        'tipo_documento' => SpedService::DOCTYPE_NFSE, // TODO refatorar quando trabalhar com NFe
                        'valor' => $vendaApi['total_value'],
                        'data_emissao' => $vendaApi['created_at'],
                        'data_referencia' => $vendaApi['created_at'],
                        'data_processamento' => $vendaApi['paid_at'],
                    ],
                    'cliente' => [
                        'nome' => $vendaApi['custom']['name'],
                        'tipo_pessoa' => $vendaApi['custom']['name'],
                        'documento' => $vendaApi['custom']['document'],
                        'email' => $vendaApi['custom']['email'],
                        'tipo_logradouro' => $this->resolveTipoLogradouro($vendaApi),
                        'logradouro' => $vendaApi['custom']['street'],
                        'numero' => $vendaApi['custom']['addr_number'],
                        'complemento' => $vendaApi['custom']['addr_complement'],
                        'bairro' => $vendaApi['custom']['neighborhood'],
                        'cep' => $vendaApi['custom']['zipcode'],
                        'cidade' => $vendaApi['custom']['city'],
                        'city_id' => $this->resolveCidadeId($vendaApi),
                        'estado' => $vendaApi['custom']['state'] ?? '',
                        'telefone_ddd' => Str::substr($vendaApi['custom']['cellphone'], 0, 2),
                        'telefone_num' => Str::substr($vendaApi['custom']['cellphone'], 2),
                    ],
                    'servicos' => [
                        [
                            'driver_id' => $vendaApi['main_content']['id'],
                            'valor' => $vendaApi['total_value'],
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

        return $tipoLogService->resolvePeloLogradouro($venda['custom']['street']);
    }

    protected function resolveCidadeId(array $venda) : int
    {
        $cidadeService = new CidadeService();

        return $cidadeService->resolveIdPeloNome($venda['custom']['city'], 'São Paulo');
    }
}
