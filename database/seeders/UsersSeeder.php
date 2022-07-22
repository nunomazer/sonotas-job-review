<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleSystemAdmin = Role::findByName(Role::SYSADMIN);

        $this->userAdemir($roleSystemAdmin);
        $this->userAroldo($roleSystemAdmin);
        $this->userLucas($roleSystemAdmin);
        $this->userRayan($roleSystemAdmin);
        $this->userRicardo($roleSystemAdmin);
    }

    public function userAdemir($role)
    {
        $email = 'ademir.mazer@raltecbr.com';
        $user = User::where('email', $email)->first();

        if (!$user) $user = new User();

        $user->name = 'Ademir Mazer Junior';
        $user->email = $email;
        $user->password = Crypt::encrypt('Senha@321');
        $user->phone_number = '991355005';
        $user->phone_area_code = '42';
        $user->save();

        return $user;
    }

    public function userLucas($role)
    {
        $email = 'lucas.amaral@raltecbr.com';
        $user = User::where('email', $email)->first();

        if (!$user) $user = new User();

        $user->name = 'Lucas Amaral';
        $user->email = $email;
        $user->password = Crypt::encrypt('Senha@321');
        $user->phone_number = '999999999';
        $user->phone_area_code = '41';
        $user->save();

        return $user;
    }

    public function userRayan($role)
    {
        $email = 'rayan.chemin@raltecbr.com';
        $user = User::where('email', $email)->first();

        if (!$user) $user = new User();

        $user->name = 'Rayan Chemin';
        $user->email = $email;
        $user->password = Crypt::encrypt('Senha@321');
        $user->phone_number = '999999999';
        $user->phone_area_code = '41';
        $user->save();

        return $user;
    }

    public function userRicardo($role)
    {
        $email = 'ricardo.gusse@raltecbr.com';
        $user = User::where('email', $email)->first();

        if (!$user) $user = new User();

        $user->name = 'Ricardo Gusse';
        $user->email = $email;
        $user->password = Crypt::encrypt('Senha@321');
        $user->phone_number = '999999999';
        $user->phone_area_code = '41';
        $user->save();

        return $user;
    }

    public function userAroldo($role)
    {
        $email = 'aroldo.almeida@raltecbr.com';
        $user = User::where('email', $email)->first();

        if (!$user) $user = new User();

        $user->name = 'Aroldo Almeida';
        $user->email = $email;
        $user->password = Crypt::encrypt('Senha@321');
        $user->phone_number = '999999999';
        $user->phone_area_code = '41';
        $user->save();

        return $user;
    }
}
