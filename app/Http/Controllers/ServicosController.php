<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmpresaRequest;
use App\Http\Requests\ServicoRequest;
use App\Models\Servico;
use App\Services\EmpresaService;
use App\Services\ServicoService;

class ServicosController extends Controller
{
    protected ServicoService $servicoService;

    public function __construct()
    {
        $this->servicoService = new ServicoService();
    }

    public function index()
    {
        $servicos = Servico::whereIn('empresa_id', auth()->user()->empresas->pluck('id')->toArray())->get();
        return view('pages.servicos.list', compact('servicos'));
    }

    public function store(ServicoRequest $request)
    {
        $servico = $this->servicoService->create($request->toArray());

        // TODO implementar visões
        return dump($servico);
    }
}
