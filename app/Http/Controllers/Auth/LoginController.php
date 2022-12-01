<?php

namespace App\Http\Controllers\Auth;

use App\Events\EmpresaCriadaEvent;
use App\Http\Controllers\Controller;
use App\Jobs\IntegracaoImportarServicos;
use App\Models\Cidade;
use App\Models\Empresa;
use App\Models\EmpresaAssinatura;
use App\Models\Integracao;
use App\Models\Plan;
use App\Models\Role;
use App\Models\User;
use App\Models\UserEmpresa;
use App\Providers\RouteServiceProvider;
use DateTime;
use Exception;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    protected $eduzzAppSlug;
    protected $eduzzAPI;
    protected $eduzzSignatureUrl;
    protected $eduzzAppID;
    protected $eduzzOAUTHUrl;
    protected $eduzzAppSecret;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except(['logout', 'oauthConfirmation']);

        $this->eduzzAppSlug = env('EDUZZ_APP_SLUG');
        $this->eduzzAPI = env('EDUZZ_API_URL');
        $this->eduzzSignatureUrl = env('EDUZZ_SIGNATURE_URL');
        $this->eduzzAppID = env('EDUZZ_APP_ID');
        $this->eduzzOAUTHUrl = env('EDUZZ_OAUTH_URL');
        $this->eduzzOAUTHApiUrl = env('EDUZZ_OAUTH_URL_API');
        $this->eduzzAppSecret = env('EDUZZ_APP_SECRET');
    }

    public function isValidSignatureStatus($clientToken, $integracaoOauth){
        $client = new \GuzzleHttp\Client([
            'base_uri'  => $this->eduzzSignatureUrl,
            'headers'   => [
                'Content-Type'  => 'application/json',
                'Accept'        => 'application/json',
                'clientToken'   => $clientToken
            ],
            'defaults'  => ['verify' => false],
        ]);
        $orbitaID = $integracaoOauth->fields['orbita_id'];
        $subscriptionRequest = $client->get("/api/subscription-status/v1/SubscriptionStatus/{$this->eduzzAppSlug}/{$orbitaID}");
        $resultSubscription = json_decode($subscriptionRequest->getBody()->getContents(), true);

        $plan = Plan::where('driver_id', $resultSubscription['plan'])->first();
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
                'status_historico' => ''
            ]
        );

        return ($subscriptionRequest->getStatusCode() == 200 && $resultSubscription['status'] == 'Active');
    }

    public function oauthConfirmation(Request $request)
    {
        $code = $request->query('code');

        try {
            if(empty($code)){
                throw new Exception("Não foi possível realizar a autenticação");
            }

            $clientOauth = new \GuzzleHttp\Client([
                'base_uri'  => $this->eduzzOAUTHApiUrl,
                'headers'   => [
                    'Content-Type'  => 'application/json',
                    'Accept'        => 'application/json'
                ],
                'defaults'  => ['verify' => false],
            ]);

            $playload = [
                "client_id"     => $this->eduzzAppID,
                "client_secret" => $this->eduzzAppSecret,
                "code"          => $code,
                "grant_type"    => "authorization_code"
            ];

            $requestOauth = $clientOauth->post('/oauth/token', [
                'json' => $playload,
            ]);

            $resultOauth = json_decode($requestOauth->getBody()->getContents(), true);


            if ($requestOauth->getStatusCode() == 200) {

                $producerID = $resultOauth['user']['id'];
                $client = new \GuzzleHttp\Client([
                    'base_uri'  => $this->eduzzAPI,
                    'headers'   => [
                        'Content-Type'  => 'application/json',
                        'Accept'        => 'application/json',
                        'Authorization' => 'Bearer ' . $resultOauth['access_token']
                    ],
                    'defaults'  => ['verify' => false],
                ]);

                $integracaoOauth = Integracao::query()->whereRaw("fields->>'oauth_user_id' = ?", [$producerID])->first();

                if(empty($integracaoOauth)){
                    $requestDados = $client->get('/myeduzz-producers/v1/producers/' . $producerID . '/profile');

                    if($requestDados->getStatusCode() != 200){
                        throw new Exception("Não foi possível obter os dados de produtor.");
                    }

                    $resultDados = json_decode($requestDados->getBody()->getContents(), true);
                    $resultDados = $resultDados['data'];

                    $requestIdentificacao = $client->get('/my-account/v1/identification');

                    if($requestIdentificacao->getStatusCode() != 200){
                        throw new Exception("Não foi possível obter os dados de identificação.");
                    }

                    $resultIdentificacao = json_decode($requestIdentificacao->getBody()->getContents(), true);

                    DB::beginTransaction();
                    try{


                        //não encontrou - primeiro acesso
                        $user = User::create([
                            'name' => $resultOauth['user']['name'],
                            'email' => $resultOauth['user']['email'],
                            'email_verified_at' => date('Y-m-d'),
                            'remember_token' => 0,
                            'password' => Hash::make(uniqid()),
                        ]);

                        $tipoLogradouro = "";
                        if(!empty($resultDados['address_street'])){
                            $exp_logradouro = explode(" ", $resultDados['address_street']);
                            if(!empty($exp_logradouro)){
                                $tipoLogradouro = $exp_logradouro[0];
                            }
                        }

                        // TODO refatorar esse fluxo para dentro do service pois teve que ser replicado aqui
                        // o comportamento inicial do service por falta de tempo para testes na refatoração neste momento
                        $city = Cidade::where('ibge_id', $resultDados['address_city_ibge'])->first();
                        $empresa = Empresa::create([
                            'owner_user_id' => $user->id,
                            'nome' => $resultDados['name'],
                            'alias' => $resultDados['business_name'],
                            'email' => $resultDados['email'],
                            'documento' => $resultDados['document_number'],
                            'telefone_num' => $resultDados['cellphone'],

                            'tipo_logradouro' => $tipoLogradouro,
                            'logradouro' => $resultDados['address_street'],
                            'numero' => $resultDados['address_number'],
                            'complemento' => $resultDados['address_complement'],
                            'bairro' => $resultDados['address_neighborhood'],
                            'cep' => $resultDados['address_zip_code'],
                            'city_id' => $city->id,
                        ]);

                        UserEmpresa::create([
                            'user_id' => $user->id,
                            'empresa_id' => $empresa->id,
                            'ativo' => true
                        ]);

                        // TODO refatorar o service criar empresa para que seja inteligente em receber integração e já criar
                        // junto com o plano que retorna da integração
                        $integracao = Integracao::create([
                            'empresa_id' => $empresa->id,
                            'name' => 'Integração com Eduzz',
                            'driver' => 'Eduzz',
                            'fields' => [
                                "email"                         => $resultOauth['user']['email'],
                                "apikey"                        => null,
                                "publickey"                     => null,
                                "oauth_access_token"            => $resultOauth['access_token'],
                                "oauth_user_id"                 => $producerID,
                                'orbita_id'                     => $resultIdentificacao['eduzzIds'][0]
                            ],
                            "ativo"                         => true,
                            "tipo_documento"                => "nfse",
                            "data_inicio"                   => date('Y-m-d'),
                            "transmissao_automatica"        => false,
                            "transmissao_periodo"           => 'month',
                            "transmissao_apenas_dias_uteis" => false,
                            "transmissao_frequencia"        => 1,
                            "vendas_importadas_em"          => null,
                        ]);

                        //atualiza variavel integracaoOauth
                        $integracaoOauth = Integracao::query()->whereRaw("fields->>'oauth_user_id' = ?", [$producerID])->first();

                        $role = Role::findByName(Role::OWNER);
                        $empresa->owner->assignRole($role);

                        DB::commit();
                    }catch(Exception $e){
                        DB::rollBack();
                        throw($e);
                    }

                    EmpresaCriadaEvent::dispatch($empresa);
                    $this->dispatch(new IntegracaoImportarServicos($empresa, $integracao));
                }

                if($this->isValidSignatureStatus(config('integra.drivers.eduzz.clientToken'), $integracaoOauth)){
                    Auth::loginUsingId($integracaoOauth->empresa->owner->id);
                    return view('pages.login.oauth-success');
                }
                throw new Exception("A assinatura não está ativa :(");
            }

            Log::error('OAUTH Eduzz - Erro', $requestOauth);
            throw new Exception("Não foi possível obter as informações da EDUZZ :(");

        } catch (Exception $exception) {
            Log::error($exception);
            return view('pages.login.oauth-error', ['message' => $exception->getMessage()]);
        }
    }
}
