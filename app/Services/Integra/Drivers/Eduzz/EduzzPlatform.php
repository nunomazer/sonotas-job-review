<?php

namespace App\Services\Integra\Drivers\Eduzz;

use App\Models\EmpresaAssinatura;
use App\Models\Integracao;
use App\Models\Plan;
use App\Models\Servico;
use App\Services\ApiService;
use App\Services\CidadeService;
use App\Services\Integra\IIntegraDriver;
use App\Services\Integra\Platform;
use App\Services\Sped\SpedService;
use App\Services\TipoLogradouroService;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class EduzzPlatform extends Platform implements IIntegraDriver
{
    public static $name = 'Eduzz';

    protected $eduzzAppSlug;
    protected $eduzzApiUrl;
    protected $eduzzSignatureUrl;
    protected $eduzzAppID;
    protected $eduzzOAUTHUrl;
    protected $eduzzAppSecret;

    protected $token = null;
    /**
     * @var Carbon
     */
    protected $token_until = null;

    public static array $fields = [
//        [
//            'name' => 'publickey',
//            'label' => 'Public Key',
//            'required' => true,
//            'visible' => true,
//            'helptext' => 'Chave pública de vínculo da plataforma',
//        ],
//        [
//            'name' => 'apikey',
//            'label' => 'Api Key',
//            'required' => true,
//            'visible' => true,
//            'helptext' => 'Chave da API de vínculo da plataforma',
//        ],
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

    public function __construct(array $config)
    {
        parent::__construct($config);

        $this->eduzzApiUrl = config('integra.drivers.eduzz.api_url');
        $this->eduzzAppSlug = config('integra.drivers.eduzz.app_slug');
        $this->eduzzSignatureUrl = config('integra.drivers.eduzz.signature_url');
        $this->eduzzAppID = config('integra.drivers.eduzz.app_id');
        $this->eduzzOAUTHUrl = config('integra.drivers.eduzz.oauth_url');
        $this->eduzzOAUTHApiUrl = config('integra.drivers.eduzz.oauth_url_api');
        $this->eduzzAppSecret = config('integra.drivers.eduzz.app_secret');
    }

    public function routes()
    {
        Route::get('/eduzz/oauth-confirmation', [EduzzController::class, 'oauthConfirmation'])->name('integra.eduzz.oauth-confirmation');
    }

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
        if (!isset($this->config['oauth_access_token'])) {
            throw new \Exception('Erro interno, o driver Eduzz precisa ser instanciado com o oauth token no array config');
        }

        return $this->config['oauth_access_token'];

//        if (!$this->token || $this->token_until->lessThan(now())) {
//            $this->generateToken();
//        }
//
//        return $this->token;

    }

    /**
     * Resolve o cliente http com a uri base do eduzz e o token
     * de segurança no cabeçalho, caso não tenha um token ele gera
     * @return Client
     */
    protected function httpClient(): Client
    {
        return new \GuzzleHttp\Client([
            'base_uri' => config('integra.drivers.eduzz.api_url'),
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

        (new ApiService())->controlThrottleServerRequest('eduzz_throttle', 60);

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

        $paginator = $result['pagination'];
        $page = 1;
        $servicos = [];
        while ($page <= $paginator['total_pages']) {
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

            if ($page <= $paginator['total_pages']) {
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
        $query['end_date'] = now()->format('Y-m-d H:i:s');
        $query['status'] = 'paid';
        if ($page) $query['page'] = $page;

        $result = $http->get('/myeduzz-sales/v1/sales', [
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
                        'nome' => $vendaApi['customer']['name'],
                        'tipo_pessoa' => $vendaApi['customer']['name'],
                        'documento' => $vendaApi['customer']['document'],
                        'email' => $vendaApi['customer']['email'],
                        'tipo_logradouro' => $this->resolveTipoLogradouro($vendaApi),
                        'logradouro' => $vendaApi['customer']['street'],
                        'numero' => $vendaApi['customer']['addr_number'],
                        'complemento' => $vendaApi['customer']['addr_complement'],
                        'bairro' => $vendaApi['customer']['neighborhood'],
                        'cep' => $vendaApi['customer']['zipcode'],
                        'cidade' => $vendaApi['customer']['city'],
                        'city_id' => $this->resolveCidadeId($vendaApi),
                        'estado' => $vendaApi['customer']['state'] ?? '',
                        'telefone_ddd' => Str::substr($vendaApi['customer']['cellphone'], 0, 2),
                        'telefone_num' => Str::substr($vendaApi['customer']['cellphone'], 2),
                    ],
                    'servicos' => [
                        [
                            'driver_id' => $vendaApi['main_content']['id'],
                            'valor' => $vendaApi['total_value'],
                            'qtde' => 1,
                            'desconto' => $vendaApi['discount_amount'],
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

        return $tipoLogService->resolvePeloLogradouro($venda['customer']['street']);
    }

    protected function resolveCidadeId(array $venda) : int
    {
        $cidadeService = new CidadeService();

        return $cidadeService->resolveIdPeloNome($venda['customer']['city'], 'São Paulo');
    }

    public function isValidSignatureStatus(Integracao $integracaoOauth)
    {
        // TODO refatorar para um service e driver corretos

        $clientToken = config('integra.drivers.eduzz.clientToken');

        $client = new \GuzzleHttp\Client([
            'base_uri'  => $this->eduzzSignatureUrl,
            'headers'   => [
                'Content-Type'  => 'application/json',
                'Accept'        => 'application/json',
                'clientToken'   => $clientToken
            ],
            'defaults'  => ['verify' => false],
        ]);
        $orbitaID = $integracaoOauth->fields['orbita_id'] ?? 0;
        $subscriptionRequest = $client->get("/api/subscription-status/v2/SubscriptionStatus/{$this->eduzzAppSlug}/{$orbitaID}");
        $resultSubscription = json_decode($subscriptionRequest->getBody()->getContents(), true);

        if ($resultSubscription['appSubscribed']) {
            $plan = Plan::where('driver_id', $resultSubscription['plan'])->first();
            $features = $plan->features;
            $features = $features->map(function ($feature) {
                $feature['balance'] = $feature['value'];
                return $feature;
            });
            EmpresaAssinatura::updateOrCreate(
                [
                    'empresa_id' => $integracaoOauth->empresa->id,
                    'driver' => 'Eduzz',
                ],
                [
                    'empresa_id' => $integracaoOauth->empresa->id,
                    'driver' => 'Eduzz',
                    'status' => $resultSubscription['status'] == 'Active' ? 1 : 0,
                    'driver_id' => $resultSubscription['plan'],
                    'plan_id' => $plan->id,
                    'status_historico' => '',
                    'features' => $features,
                ]
            );
        }

        return ($subscriptionRequest->getStatusCode() == 200 && $resultSubscription['status'] == 'Active');
    }
}
