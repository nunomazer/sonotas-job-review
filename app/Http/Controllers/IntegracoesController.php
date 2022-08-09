<?php

namespace App\Http\Controllers;

use App\Http\Requests\IntegracaoRequest;
use App\Jobs\IntegracaoImportarServicos;
use App\Models\Empresa;
use App\Models\Integracao;
use App\Services\Integra\IntegraService;
use App\Services\ServicoService;
use Illuminate\Http\Request;

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


    public function importarFromPlatform(Request $request, Empresa $empresa, Integracao $integracao)
    {
        $this->dispatch(new IntegracaoImportarServicos($empresa, $integracao));

        return redirect()->back()->with('success', 'Importação de serviços em execução, ao finalizar o resultado é informado na área de notificações');
    }
}
