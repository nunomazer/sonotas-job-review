<?php

namespace App\Http\Controllers\Auth;

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
use App\Providers\RouteServiceProvider;
use DateTime;
use Exception;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
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
        $this->middleware('guest')->except(['logout']);
    }

}
