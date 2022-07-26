<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Integracao;
use App\Services\Integra\IntegraService;

class IntegracoesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit(Empresa $empresa, Integracao $integracao)
    {
        $driver = (new IntegraService())->driver($integracao->driver, $integracao->fields);
        return view('pages.empresas.integracoes.edit', compact('integracao', 'driver'));
    }

}
