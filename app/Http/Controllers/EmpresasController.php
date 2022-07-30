<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmpresaRequest;
use App\Models\Empresa;
use App\Services\EmpresaService;

class EmpresasController extends Controller
{
    protected EmpresaService $empresaService;

    public function __construct()
    {
        $this->middleware('auth');
        $this->empresaService = new EmpresaService();
    }

    public function index()
    {
        $empresas = $this->empresaService->getEmpresasOwner(auth()->user());
        return view('pages.empresas.list', compact('empresas'));
    }

    public function store(EmpresaRequest $request)
    {
        $empresa = $this->empresaService->create($request->toArray());

        // TODO implementar visões
        return dump($empresa);
    }

    public function edit(Empresa $empresa)
    {
        return view('pages.empresas.edit', compact('empresa'));
    }

    public function update(Empresa $empresa)
    {
        return redirect()->route('empresas.list', )
            ->with(['success' => 'Empresa '.$empresa->nome.' atualizada com successo !']);
    }
}
