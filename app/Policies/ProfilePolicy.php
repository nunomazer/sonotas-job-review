<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProfilePolicy
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

    public function accessAndEdit(User $user)
    {
        if (auth()->user()->hasRole(Role::SYSADMIN)) return true;

        return $user->id == auth()->user()->id;
    }
}
