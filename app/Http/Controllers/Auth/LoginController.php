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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except(['logout', 'oauthConfirmation']);
    }
    
    public function oauthConfirmation(Request $request)
    {
        $code = $request->query('code'); 
        if(empty($code)){
            throw new Exception("Não foi possível realizar a autenticação");
        }

        $eduzzAppID = env('EDUZZ_APP_ID');
        $eduzzAPI = env('EDUZZ_API_URL');
        $eduzzAppSecret = env('EDUZZ_APP_SECRET'); 
        $eduzzAppSlug = env('EDUZZ_APP_SLUG');   

        $client = new \GuzzleHttp\Client([
            'base_uri' => $eduzzAPI,
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json'
            ],
            'defaults' => ['verify' => false],
        ]); 

        $playload = [
            "client_id"     => $eduzzAppID,
            "client_secret" => $eduzzAppSecret,
            "code"          => $code,
            "grant_type"    => "authorization_code"
        ];

        try {
            $requestOauth = $client->post('/oauth/token', [
                'json' => $playload,
            ]);

            $resultOauth = json_decode($requestOauth->getBody()->getContents(), true);
            
            if ($requestOauth->getStatusCode() == 200) {
                $producerID = $resultOauth['user']['id'];
                $integracaoOauth = Integracao::query()->whereRaw("fields->>'oauth_user_id'", [$producerID])->first();

                if(empty($integracaoOauth)){
                    //não encontrou - primeiro acesso
                    $user = User::create([
                        'name' => $resultOauth['user']['name'],
                        'email' => $resultOauth['user']['email'],
                        'email_verified_at' => date('Y-m-d'),
                        'remember_token' => 0,
                        'password' => Hash::make(uniqid()),
                    ]);
                    
                    $empresa = Empresa::create([
                        'owner_user_id' => $user->id,
                        'name' => $resultOauth['user']['name'],
                        'email' => $resultOauth['user']['email'],
                        'email_verified_at' => date('Y-m-d'),
                        'remember_token' => 0,
                        'password' => Hash::make(uniqid()),
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

                    Auth::loginUsingId($user->id);
                    return view('pages.login.oauth-success');
                }
                else{
                    //já existe
                    $usuario = $integracaoOauth->empresa->owner;                    
                    $subscriptionRequest = $client->get("/api/subscription-status/v1/SubscriptionStatus/{$eduzzAppSlug}/{$producerID}");
                    $resultSubscription = json_decode($subscriptionRequest->getBody()->getContents(), true);

                    if ($requestOauth->getStatusCode() == 200) {
                        if($resultSubscription['status'] == 'active'){
                            Auth::loginUsingId($usuario->id);
                            return view('pages.login.oauth-success');
                        }
                        throw new Exception("A assinatura não está ativa :(");
                    }
                    throw new Exception("Não foi possível obter os dados de assinatura :(");
                }                
            }

            Log::error('OAUTH Eduzz - Erro', $requestOauth);
            throw new Exception("Não foi possível obter as informações da EDUZZ :(");

        } catch (Exception $exception) {
            Log::error($exception); 
            return view('pages.login.oauth-error', ['message' => $exception->getMessage()]);
        }
    }
}