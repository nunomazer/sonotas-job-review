<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmpresaRequest;
use App\Services\EmpresaService;

class EmpresaController extends Controller
{
    protected EmpresaService $empresaService;

    public function __construct()
    {
        $this->empresaService = new EmpresaService();
    }

    public function store(EmpresaRequest $request)
    {
        $empresa = $this->empresaService->create($request->toArray());

        // TODO implementar visões
        return dump($empresa);
    }
}
