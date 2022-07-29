<?php

namespace App\Http\Controllers;

use App\Http\Requests\IntegracaoRequest;
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
        return view('pages.empresas.integracoes.edit', compact('empresa', 'integracao', 'driver'));
    }

    public function update(IntegracaoRequest $request, Empresa $empresa, Integracao $integracao)
    {
        $integracao->update($request->toArray());

        return redirect()->route('empresas.list', )
            ->with(['success' => 'Integração atualizada com successo !']);
    }

}
