<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmpresaRequest;
use App\Services\EmpresaService;

class EmpresasController extends Controller
{
    protected EmpresaService $empresaService;

    public function __construct()
    {
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
}
