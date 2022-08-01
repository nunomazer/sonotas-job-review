<?php

namespace App\Policies;

use App\Http\Requests\EmpresaConfigNFSeRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmpresaConfigNFSePolicy
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

    public function update(User $user, EmpresaConfigNFSeRequest $nfseConfig)
    {
        return false; // TODO
        if (auth()->user()->hasRole(Role::SYSADMIN)) return true;

        return in_array($user->id, auth()->user()->empresas->pluck('id')->toArray());
    }
}
