<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmpresaRequest;
use App\Models\Role;
use App\Models\User;
use App\Services\EmpresaService;

class UserController extends Controller
{
    public function showProfile(User $user)
    {
        $this->authorize('accessAndEdit', $user);

        return view('pages.profile.show', compact('user'));
    }
}
