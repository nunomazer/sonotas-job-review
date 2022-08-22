<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmpresaRequest;
use App\Http\Requests\ServicoRequest;
use App\Models\Empresa;
use App\Models\Integracao;
use App\Models\Servico;
use App\Services\EmpresaService;
use App\Services\ServicoService;
use Illuminate\Http\Request;

class ServicosController extends Controller
{
    protected ServicoService $servicoService;

    public function __construct()
    {
        $this->servicoService = new ServicoService();
    }

    public function index()
    {
        $servicos = Servico::whereIn('empresa_id', auth()->user()->empresasIdsArray())->get();
        $integracoes = Integracao::whereIn('empresa_id', auth()->user()->empresasIdsArray())->get();
        return view('pages.servicos.list', compact('servicos','integracoes'));
    }

    public function create()
    {
        $empresas = auth()->user()->empresas;
        return view('pages.servicos.edit', compact('empresas'));
    }

    public function store(ServicoRequest $request)
    {
        $servico = $this->servicoService->create($request->toArray());

        return redirect()->route('servicos.list', )
            ->with(['success' => 'Serviço criado com successo !']);
    }

    public function edit(Servico $servico)
    {
        return view('pages.servicos.edit', compact('servico'));
    }


    public function update(ServicoRequest $request, Servico $servico)
    {
        $servico->fill($request->toArray());
        $servico = $this->servicoService->update($servico);

        return redirect()->route('servicos.list', )
            ->with(['success' => 'Servico "'.$servico->nome.'" atualizado com successo !']);
    }

}
