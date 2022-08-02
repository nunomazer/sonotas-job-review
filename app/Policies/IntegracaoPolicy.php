<?php

namespace App\Policies;

use App\Models\Integracao;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class IntegracaoPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function update(User $user, Integracao $integracao)
    {
        if (auth()->user()->hasRole(Role::SYSADMIN)) return true;

        return in_array($integracao->empresa->id, auth()->user()->empresas->pluck('id')->toArray());
    }
}
