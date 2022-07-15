<?php

namespace Database\Seeders;

use App\Models\Empresa;
use App\Models\Role;
use App\Models\User;
use App\Services\Sped\Sped;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Crypt;

class TesteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = $this->userAntonio();
        $this->empresaWP($user);
    }

    public function userAntonio()
    {
        $email = 'antonio@gmail.com';
        $user = User::where('email', $email)->first();

        if (!$user) $user = new User();

        $user->name = 'Antonio da Silva';
        $user->email = $email;
        $user->password = Crypt::encrypt('123456');
        $user->phone_number = '99110011';
        $user->phone_area_code = '55';
        $user->save();

        return $user;
    }

    public function empresaWP($user)
    {
        $documento = '01713414000120';
        $empresa = Empresa::where('documento', $documento)->first();

        if (!$empresa) $empresa = new Empresa();

        $empresa = new Empresa();
        $empresa->owner_user_id = $user->id;
        $empresa->documento = $documento;
        $empresa->nome = 'Winponta';
        $empresa->inscricao_municipal = '9292929';
        $empresa->inscricao_estadual = '922222777';
//                'certificado' => $empresa->certificado->sped_id,
        $empresa->regime_tributario = Sped::REGIME_LUCRO_PRESUMIDO;
        $empresa->regime_tributario_especial = Sped::REGIME_ESPECIAL_NENHUM;
        $empresa->bairro = 'Uvaranas';
        $empresa->cep = '84031120';
        $empresa->city_id = 3062;
        $empresa->logradouro = 'Januário de Napoli';
        $empresa->numero = 18;
        $empresa->tipo_logradouro = 'Rua';
        $empresa->telefone_num = '991355005';
        $empresa->telefone_ddd = '42';
        $empresa->email = 'ademir.mazer.jr@gmail.com';
        $empresa->save();
    }
}
