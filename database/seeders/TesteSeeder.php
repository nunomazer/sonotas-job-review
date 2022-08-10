<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\Empresa;
use App\Models\EmpresaNFSConfig;
use App\Models\Integracao;
use App\Models\Role;
use App\Models\Servico;
use App\Models\User;
use App\Services\EmpresaService;
use App\Services\Integra\IntegraService;
use App\Services\Sped\SpedRegimesTributarios;
use App\Services\Sped\SpedRegimesTributariosEspeciais;
use App\Services\Sped\SpedService;
use Faker\Factory;
use Faker\Provider\pt_BR\Text;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class TesteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = $this->userAdemir();
        $empresa = $this->empresaWP($user);
        $this->empresaWPIntegraEduzz($empresa);

        $user = $this->userLucasMktDigital();
        $empresa = $this->empresaMktDigitalBr($user);
        $this->empresaMktDigitalBrIntegraEduzz($empresa);
    }

    public function userAdemir()
    {
        $email = 'ademir.mazer.jr@gmail.com';
        $user = User::where('email', $email)->first();

        if (!$user) $user = new User();

        $user->name = 'Ademir Mazer Junior';
        $user->email = $email;
        $user->password = Hash::make('123456');
        $user->phone_number = '99110011';
        $user->phone_area_code = '55';
        $user->save();

        return $user;
    }

    public function empresaWP($user)
    {
        /**
         * Empresa
         */
        $documento = '01713414000120';
        $empresa = Empresa::where('documento', $documento)->first();

        if (!$empresa) $empresa = new Empresa();

        $empresa->owner_user_id = $user->id;
        $empresa->documento = $documento;
        $empresa->nome = 'Winponta';
        $empresa->inscricao_municipal = '9292929';
        $empresa->inscricao_estadual = '922222777';
//                'certificado' => $empresa->certificado->sped_id,
        $empresa->regime_tributario = SpedRegimesTributarios::LUCRO_PRESUMIDO;
        $empresa->regime_tributario_especial = SpedRegimesTributariosEspeciais::NENHUM;
        $empresa->bairro = 'Uvaranas';
        $empresa->cep = '84031120';
        $empresa->city_id = 3062;
        $empresa->logradouro = 'Januário de Napoli';
        $empresa->numero = 18;
        $empresa->tipo_logradouro = 'Rua';
        $empresa->telefone_num = '991355005';
        $empresa->telefone_ddd = '42';
        $empresa->email = 'ademir.mazer.jr@gmail.com';
        //$empresa->save();

        if ($empresa->id) {
            $empresa->save();
        } else {
            $empresaService = new EmpresaService();
            $empresa = $empresaService->create($empresa->toArray());
        }

        /**
         * Cliente
         */
        $documentoCliente = '62680927000177';
        $cliente = Cliente::where('documento', $documentoCliente)->first();

        if (!$cliente) $cliente = new Cliente();

        $cliente->empresa_id = $empresa->id;
        $cliente->documento = $documentoCliente;
        $cliente->nome = Factory::create('pt_BR')->name;
        //$cliente->inscricao_municipal = '9292929';
        //$cliente->inscricao_estadual = '922222777';
//                'certificado' => $cliente->certificado->sped_id,
        $cliente->bairro = 'Uvaranas';
        $cliente->cep = '84031120';
        $cliente->city_id = 3062;
        $cliente->logradouro = 'Januário de Napoli';
        $cliente->numero = 18;
        $cliente->tipo_logradouro = 'Rua';
        $cliente->telefone_num = '991355005';
        $cliente->telefone_ddd = '42';
        $cliente->email = 'ademir.mazer.jr@gmail.com';
        $cliente->save();

        /**
         * SERVICOS
         */
        $servico = Servico::where('empresa_id', $empresa->id)
            ->where('nome', 'Consultoria em software')->first();

        if (!$servico) $servico = new Servico();

        $servico->empresa_id = $empresa->id;
        $servico->tipo_servico_codigo = '01.06';
        $servico->nome = 'Consultoria em software';
        $servico->valor = 150;
        $servico->descricao = 'Horas de consultoria em projetos de software';
        $servico->cofins = 0;
        $servico->csll = 0;
        $servico->inss = 0;
        $servico->ir = 0;
        $servico->pis = 0;
        $servico->iss = 4;
        $servico->iss_retido_fonte = false;
        $servico->enviar_nota_email_cliente = true;
        $servico->save();

        /**
         * NFSE Config da Empresa
         */
        $nfseConf = EmpresaNFSConfig::where('empresa_id', $empresa->id)->first();

        if (!$nfseConf) $nfseConf = new EmpresaNFSConfig();

        $nfseConf->empresa_id = $empresa->id;
        $nfseConf->cnae_codigo = '6202300';
        $nfseConf->cofins = 0;
        $nfseConf->csll = 0;
        $nfseConf->inss = 0;
        $nfseConf->ir = 0;
        $nfseConf->pis = 0;
        $nfseConf->iss = 4;

        $nfseConf->iss_retido_fonte = false;

        $nfseConf->tipo_servico_codigo = '08.02';

        $nfseConf->tributos = 6;

        $nfseConf->enviar_nota_email_cliente = true;
        $nfseConf->save();

        return $empresa;
    }

    public function empresaWPIntegraEduzz($empresa)
    {
        $eduzzDriver = (new IntegraService())->driver('eduzz', []);

        $fields = [
            'publickey' => env('MAZER_EDUZZ_PUBLIC_KEY'),
            'apikey' => env('MAZER_EDUZZ_API_KEY'),
            'email' => env('MAZER_EDUZZ_EMAIL'),
        ];

        $integracao = new Integracao();
        $integracao->empresa_id = $empresa->id;
        $integracao->name = 'Integração com Eduzz';
        $integracao->fields = $fields;
        $integracao->driver = $eduzzDriver->name();
        $integracao->tipo_documento = SpedService::DOCTYPE_NFSE;
        $integracao->data_inicio = '2022-07-01';
        $integracao->transmissao_automatica = false;
        $integracao->transmissao_periodo = 'day';
        $integracao->transmissao_apenas_dias_uteis = false;
        $integracao->save();
    }

    public function userLucasMktDigital()
    {
        $email = 'vendasmktdigitalbr@gmail.com';
        $user = User::where('email', $email)->first();

        if (!$user) $user = new User();

        $user->name = 'Lucas Mkt Digital';
        $user->email = $email;
        $user->password = Hash::make('123456');
        $user->phone_number = '99110011';
        $user->phone_area_code = '45';
        $user->save();

        return $user;
    }

    public function empresaMktDigitalBr($user)
    {
        /**
         * Empresa
         */
        $documento = '58105511000158';
        $empresa = Empresa::where('documento', $documento)->first();

        if (!$empresa) $empresa = new Empresa();

        $empresa->owner_user_id = $user->id;
        $empresa->documento = $documento;
        $empresa->nome = 'Mkt Digital BR';
        $empresa->inscricao_municipal = '9999222200';
        //$empresa->inscricao_estadual = '922222777';
//                'certificado' => $empresa->certificado->sped_id,
        $empresa->regime_tributario = SpedRegimesTributarios::SIMPLES_NACIONAL;
        $empresa->regime_tributario_especial = SpedRegimesTributariosEspeciais::NENHUM;
        $empresa->bairro = 'Centro';
        $empresa->cep = '85031120';
        $empresa->city_id = 3060;
        $empresa->logradouro = 'João Negrão';
        $empresa->numero = 180;
        $empresa->tipo_logradouro = 'Rua';
        $empresa->telefone_num = '891054505';
        $empresa->telefone_ddd = '41';
        $empresa->email = 'vendasmktdigitalbr@gmail.com';
        //$empresa->save();

        if ($empresa->id) {
            $empresa->save();
        } else {
            $empresaService = new EmpresaService();
            $empresa = $empresaService->create($empresa->toArray());
        }

        /**
         * Cliente
         */
        $documentoCliente = '22763181040';
        $cliente = Cliente::where('documento', $documentoCliente)->first();

        if (!$cliente) $cliente = new Cliente();

        $cliente->empresa_id = $empresa->id;
        $cliente->documento = $documentoCliente;
        $cliente->nome = Factory::create('pt_BR')->name;
        //$cliente->inscricao_municipal = '9292929';
        //$cliente->inscricao_estadual = '922222777';
//                'certificado' => $cliente->certificado->sped_id,
        $cliente->bairro = 'Zona Sul';
        $cliente->cep = '80000100';
        $cliente->city_id = 1062;
        $cliente->logradouro = 'Sete de Setembro';
        $cliente->numero = 1888;
        $cliente->tipo_logradouro = 'Avenida';
        $cliente->telefone_num = '992320101';
        $cliente->telefone_ddd = '11';
        $cliente->email = 'ademir.mazer.jr@gmail.com';
        $cliente->save();

        /**
         * SERVICOS
         */
        $servico = Servico::where('empresa_id', $empresa->id)
            ->where('nome', 'Venda mais na internet')->first();

        if (!$servico) $servico = new Servico();

        $servico->empresa_id = $empresa->id;
        $servico->tipo_servico_codigo = '01.06';
        $servico->nome = 'Venda mais na internet';
        $servico->valor = 200;
        $servico->descricao = 'Ebook de marketing digital';
        $servico->cofins = 0;
        $servico->csll = 0;
        $servico->inss = 0;
        $servico->ir = 0;
        $servico->pis = 0;
        $servico->iss = 4;
        $servico->iss_retido_fonte = false;
        $servico->enviar_nota_email_cliente = true;
        $servico->save();

        /**
         * NFSE Config da Empresa
         */
        $nfseConf = EmpresaNFSConfig::where('empresa_id', $empresa->id)->first();

        if (!$nfseConf) $nfseConf = new EmpresaNFSConfig();

        $nfseConf->empresa_id = $empresa->id;
        $nfseConf->cnae_codigo = '6202300';
        $nfseConf->cofins = 0;
        $nfseConf->csll = 0;
        $nfseConf->inss = 0;
        $nfseConf->ir = 0;
        $nfseConf->pis = 0;
        $nfseConf->iss = 4;

        $nfseConf->iss_retido_fonte = false;

        $nfseConf->tipo_servico_codigo = '08.02';

        $nfseConf->tributos = 6;

        $nfseConf->enviar_nota_email_cliente = true;
        $nfseConf->save();

        return $empresa;
    }

    public function empresaMktDigitalBrIntegraEduzz($empresa)
    {
        $eduzzDriver = (new IntegraService())->driver('eduzz', []);

        $fields = [
            'publickey' => env('DIGIBR_EDUZZ_PUBLIC_KEY'),
            'apikey' => env('DIGIBR_EDUZZ_API_KEY'),
            'email' => env('DIGIBR_EDUZZ_EMAIL'),
        ];

        $integracao = new Integracao();
        $integracao->empresa_id = $empresa->id;
        $integracao->name = 'Integração com Eduzz';
        $integracao->fields = $fields;
        $integracao->driver = $eduzzDriver->name();
        $integracao->tipo_documento = SpedService::DOCTYPE_NFSE;
        $integracao->data_inicio = '2022-07-01';
        $integracao->transmissao_automatica = false;
        $integracao->transmissao_periodo = 'hour';
        $integracao->transmissao_apenas_dias_uteis = false;
        $integracao->save();
    }
}
