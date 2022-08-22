<?php

namespace App\Policies;

use App\Models\Empresa;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ServicoPolicy
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

    protected function isEmpresaIdRelatedToUser(Empresa $empresa)
    {
        return in_array($empresa->id, auth()->user()->empresas->pluck('id')->toArray());
    }

    public function update(User $user, Empresa $empresa)
    {
        if (auth()->user()->hasRole(Role::SYSADMIN)) return true;

        return $this->isEmpresaIdRelatedToUser($empresa);
    }

}
