<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmpresaRequest;
use App\Http\Requests\ServicoRequest;
use App\Services\EmpresaService;
use App\Services\ServicoService;

class ServicoController extends Controller
{
    protected ServicoService $servicoService;

    public function __construct()
    {
        $this->servicoService = new ServicoService();
    }

    public function store(ServicoRequest $request)
    {
        $servico = $this->servicoService->create($request->toArray());

        // TODO implementar visões
        return dump($servico);
    }
}
