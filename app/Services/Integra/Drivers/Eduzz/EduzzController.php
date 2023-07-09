<?php

namespace App\Services\Integra\Drivers\Eduzz;

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
use App\Services\EmpresaService;
use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class EduzzController extends Controller
{
    protected $eduzzAppSlug;
    protected $eduzzApiUrl;
    protected $eduzzSignatureUrl;
    protected $eduzzAppID;
    protected $eduzzOAUTHUrl;
    protected $eduzzAppSecret;
    public function __construct()
    {
        $this->eduzzApiUrl = config('integra.drivers.eduzz.api_url');
        $this->eduzzAppSlug = config('integra.drivers.eduzz.app_slug');
        $this->eduzzSignatureUrl = config('integra.drivers.eduzz.signature_url');
        $this->eduzzAppID = config('integra.drivers.eduzz.app_id');
        $this->eduzzOAUTHUrl = config('integra.drivers.eduzz.oauth_url');
        $this->eduzzOAUTHApiUrl = config('integra.drivers.eduzz.oauth_url_api');
        $this->eduzzAppSecret = config('integra.drivers.eduzz.app_secret');
    }

    public function oauthConfirmation(Request $request)
    {
        $code = $request->query('code');

        try {
            if(empty($code)){
                throw new \Exception("Não foi possível realizar a autenticação");
            }

            /**
             * Oauth para pegar token
             */
            $clientOauth = new \GuzzleHttp\Client([
//                'base_uri'  => $this->eduzzOAUTHApiUrl,
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

            // Request para o token
            $requestOauth = $clientOauth->post($this->eduzzOAUTHApiUrl.'/oauth/token', [
                'json' => $playload,
            ]);

            $resultOauth = json_decode($requestOauth->getBody()->getContents(), true);

            /**
             * Por vezes esta chamada retorna 200 mas ao processar o retorno não é um json e o result fica como null
             */
            if ($requestOauth->getStatusCode() != 200 || $resultOauth == null) {
                Log::error('OAUTH Eduzz - Erro', $requestOauth);
                throw new Exception("Não foi possível obter as informações da EDUZZ :(");
            }

            /**
             * Prepara para pegar integrações do user logado
             */
            $producerID = $resultOauth['user']['id'];
            $client = new \GuzzleHttp\Client([
                'base_uri'  => $this->eduzzApiUrl,
                'headers'   => [
                    'Content-Type'  => 'application/json',
                    'Accept'        => 'application/json',
                    'Authorization' => 'Bearer ' . $resultOauth['access_token']
                ],
                'defaults'  => ['verify' => false],
            ]);

            $integracaoOauth = Integracao::query()->whereRaw("fields->>'oauth_user_id' = ?", [$producerID])->first();
            $user = User::where('email', $resultOauth['user']['email'])->first();

            // se não encontrou uma integração vai criar
            if(empty($integracaoOauth)) {
                $requestDadosProdutor = $client->get('/myeduzz-producers/v1/producers/' . $producerID . '/profile');

                if($requestDadosProdutor->getStatusCode() != 200){
                    throw new Exception("Não foi possível obter os dados de produtor na Eduzz.");
                }

                $eduzzProdutor = json_decode($requestDadosProdutor->getBody()->getContents(), true);
                $eduzzProdutor = $eduzzProdutor['data'];

                $requestIdentificacao = $client->get('/my-account/v1/identification');

                if($requestIdentificacao->getStatusCode() != 200){
                    throw new Exception("Não foi possível obter os dados de identificação.");
                }

                $resultIdentificacao = json_decode($requestIdentificacao->getBody()->getContents(), true);

                DB::beginTransaction();
                try{
                    if (empty($user)) {
                        //não encontrou usuário - primeiro acesso
                        $user = User::create([
                            'name' => $resultOauth['user']['name'],
                            'email' => $resultOauth['user']['email'],
                            'email_verified_at' => date('Y-m-d'),
                            'remember_token' => 0,
                            'password' => Hash::make(uniqid()),
                        ]);
                    }

                    $tipoLogradouro = "";
                    if(!empty($eduzzProdutor['address_street'])){
                        $exp_logradouro = explode(" ", $eduzzProdutor['address_street']);
                        if(!empty($exp_logradouro)){
                            $tipoLogradouro = $exp_logradouro[0];
                        }
                    }

                    // TODO refatorar esse fluxo para dentro do service pois teve que ser replicado aqui
                    // o comportamento inicial do service por falta de tempo para testes na refatoração neste momento
                    $city = Cidade::where('ibge_id', $eduzzProdutor['address_city_ibge'])->first();
                    if ($city == null) {
                        // se não encontrou provavelmente é o código de cidade desconhecida, força SP por padrão
                        $city = Cidade::where('ibge_id', 3550308)->first();
                    }

                    // devido a um problema em alguns Sandbox, como da Eduzz, que entregam valores errados de
                    // cnpj, se NÃO estamos em ambiente de produção, geramos um CNPJ válido para poder passar
                    // pelo fluxo completo, além de não trazer dados completos necessários para o Plugnotas
                    if (app()->environment('production') == false) {
                        $faker = Factory::create('pt_BR');
                        $eduzzProdutor['document_number'] = $faker->cnpj(false);
                        $eduzzProdutor['municipal_registration'] = $eduzzProdutor['municipal_registration'] ?? '909090';
                        logger()->debug($eduzzProdutor);
                    }

                    $empresa = Empresa::where('documento', $eduzzProdutor['document_number'])->first();

                    if (empty($empresa)) {
                        $novaEmpresa = [
                            'owner_user_id' => $user->id,
                            'nome' => $eduzzProdutor['name'],
                            'alias' => $eduzzProdutor['business_name'],
                            'email' => $eduzzProdutor['email'],
                            'documento' => $eduzzProdutor['document_number'],
                            'inscricao_municipal' => $eduzzProdutor['municipal_registration'],
                            'inscricao_estadual' => $eduzzProdutor['state_registration'],
                            'telefone_num' => $eduzzProdutor['cellphone'],

                            'tipo_logradouro' => $tipoLogradouro ?? 'Rua',
                            'logradouro' => $eduzzProdutor['address_street'] ?? 'Desconhecido',
                            'numero' => $eduzzProdutor['address_number'] ?? 'S/N',
                            'complemento' => $eduzzProdutor['address_complement'],
                            'bairro' => $eduzzProdutor['address_neighborhood'] ?? 'Desconhecido',
                            'cep' => $eduzzProdutor['address_zip_code'] ?? '00000000',
                            'city_id' => $city->id,
                        ];

                        // usa service de Empresa corretamente
                        $empresa = (new EmpresaService())->create($novaEmpresa);
                    }

                    UserEmpresa::updateOrCreate([
                        'user_id' => $user->id,
                        'empresa_id' => $empresa->id,
                    ],[
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

                    $role = Role::findByName(Role::OWNER);
                    $empresa->owner->assignRole($role);

                    //atualiza variavel integracaoOauth
                    $integracaoOauth = Integracao::query()->whereRaw("fields->>'oauth_user_id' = ?", [$producerID])->first();

                    DB::commit();
                }catch(Exception $e){
                    DB::rollBack();
                    throw($e);
                }

                // força a sincronização dos serviços com a integração Eduzz
                $this->dispatch(new IntegracaoImportarServicos($empresa, $integracao));
            }

            /**
             * Faz o login usando os dados da Eduzz
             */
            $eduzzDriver = new EduzzPlatform($integracaoOauth->fields);
//            if($eduzzDriver->isValidSignatureStatus($integracaoOauth)){
                Auth::loginUsingId($integracaoOauth->empresa->owner->id);

                return redirect('/');
//            }
//
//            return redirect('login')
//                ->withErrors("Nenhuma assinatura ativa :(");

        } catch (\Exception $exception) {
            Log::error($exception);

            if (strpos($exception->getMessage(), 'Token already used') !== false) {
                return redirect('login')
                    ->withErrors('Ocorreu um erro na autenticação com Eduzz, por favor tente novamente.');
            }

            if (strpos($exception->getMessage(), 'User_not_found') !== false) {
                return redirect('login')
                    ->withErrors('Usuário não encontrado na Eduzz.');
            }

            //return view('pages.login.oauth-error', ['message' => $exception->getMessage()]);

            return redirect('login')
                ->withErrors([
                    'Aconteceu um problema no serviço Eduzz, por favor tente novamente ou entre em contato com nosso suporte.',
                    '<b>Atenção</b> Se você comprou o plano pela Eduzz e este é o primeiro acesso, utilize a opção "Acessar com Eduzz" para sua conta ser criada.'
                ]);
        }
    }

}
