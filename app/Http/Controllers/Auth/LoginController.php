<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use App\Models\Integracao;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use DateTime;
use Exception;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

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
        $this->eduzzAppID = env('EDUZZ_APP_ID');
        $this->eduzzOAUTHUrl = env('EDUZZ_OAUTH_URL');
        $this->eduzzAppSecret = env('EDUZZ_APP_SECRET'); 
    }

    public function isValidSignatureStatus($accessToken, $producerID){
        $client = new \GuzzleHttp\Client([
            'base_uri'  => $this->eduzzAPI,
            'headers'   => [
                'Content-Type'  => 'application/json',
                'Accept'        => 'application/json',
                'Authorization' => 'Bearer ' . $accessToken
            ],
            'defaults'  => ['verify' => false],
        ]); 
        $subscriptionRequest = $client->get("/api/subscription-status/v1/SubscriptionStatus/{$this->eduzzAppSlug}/{$producerID}");
        $resultSubscription = json_decode($subscriptionRequest->getBody()->getContents(), true);

        return ($subscriptionRequest->getStatusCode() == 200 && $resultSubscription['status'] == 'active');
    }
    
    public function oauthConfirmation(Request $request)
    {
        $code = $request->query('code'); 
        if(empty($code)){
            throw new Exception("Não foi possível realizar a autenticação");
        }

        $clientOauth = new \GuzzleHttp\Client([
            'base_uri'  => $this->eduzzOAUTHUrl,
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

        try {
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
                        'Authorization' => 'Bearer ' . $resultOauth['user']['access_token']
                    ],
                    'defaults'  => ['verify' => false],
                ]); 
                $integracaoOauth = Integracao::query()->whereRaw("fields->>'oauth_user_id'", [$producerID])->first();

                if(empty($integracaoOauth)){
                    
                    $requestDados = $client->post('/myeduzz-producers/v1/producers/' . $producerID, [
                        'json' => $playload,
                    ]);
                    
                    $resultDados = json_decode($requestDados->getBody()->getContents(), true);

                    //não encontrou - primeiro acesso
                    $user = User::create([
                        'name' => $resultOauth['user']['name'],
                        'email' => $resultOauth['user']['email'],
                        'email_verified_at' => date('Y-m-d'),
                        'remember_token' => 0,
                        'password' => Hash::make(uniqid()),
                    ]);

                    $tipoLogradouro = "";
                    if(!empty($resultDados['address']['street'])){
                        $exp_logradouro = explode(" ", $resultDados['address']['street']);
                        if(!empty($exp_logradouro)){
                            $tipoLogradouro = $exp_logradouro[0];
                        }
                    }

                    $empresa = Empresa::create([
                        'owner_user_id' => $user->id,
                        'nome' => $resultDados['email'],
                        'alias' => $resultDados['business_name'],
                        'email' => $resultDados['email'],
                        'documento' => $resultDados['document_number'],
                        'telefone_num' => $resultDados['cellphone'],
                        
                        'tipo_logradouro' => $tipoLogradouro,
                        'logradouro' => $resultDados['address']['street'],
                        'numero' => $resultDados['address']['number'],
                        'complemento' => $resultDados['address']['complement'],
                        'bairro' => $resultDados['address']['neighborhood'],
                        'cep' => $resultDados['address']['zip_code'],
                        'city_id' => $resultDados['address']['city_id'], //validar se é possível vir o codigo ibge
                    ]);
                    
                    Integracao::create([
                        'empresa_id' => $empresa->id,
                        'name' => 'Integração com Eduzz',
                        'driver' => 'Eduzz',
                        'fields' => json_encode([ 
                            "email"                         => $resultOauth['user']['email'],
                            "apikey"                        => null,
                            "publickey"                     => null,
                            "oauth_access_token"            => $resultOauth['access_token'],
                            "oauth_user_id"                 => $producerID,
                            "ativo"                         => true,
                            "tipo_documento"                => "nfse",
                            "data_inicio"                   => date('Y-m-d'),
                            "transmissao_automatica"        => false,
                            "transmissao_periodo"           => 'month',
                            "transmissao_apenas_dias_uteis" => false,
                            "transmissao_frequencia"        => 1,
                            "vendas_importadas_em"          => null,
                        ]), 
                    ]);

                    //atualiza variavel integracaoOauth
                    $integracaoOauth = Integracao::query()->whereRaw("fields->>'oauth_user_id'", [$producerID])->first(); 
                } 
                
                if($this->isValidSignatureStatus($resultOauth['user']['access_token'], $producerID)){
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