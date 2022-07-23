<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Integracao;

class IntegracoesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit(Empresa $empresa, Integracao $integracao)
    {
        return view('pages.empresas.integracoes.edit', compact('integracao'));
    }

}
