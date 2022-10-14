<?php

namespace App\Http\Controllers;

use App\DataTables\ServicoDataTable;
use App\Http\Requests\EmpresaRequest;
use App\Http\Requests\ServicoRequest;
use App\Models\EmpresaNFSConfig;
use App\Models\Integracao;
use App\Models\Servico;
use App\Models\Empresa;
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

    public function index(ServicoDataTable $dataTable)
    {
        $empresasID_array = auth()->user()->empresasIdsArray();
        $config = EmpresaNFSConfig::whereIn('empresa_id', $empresasID_array)->count();

        if($config === 0){
            return view('pages.servicos.noconfig');
        }

        return $dataTable->render('pages.servicos.index');
        
        // $integracoes = Integracao::whereIn('empresa_id', $empresasID_array)->get();

        // $servicos = Servico::whereIn('empresa_id', $empresasID_array)
        //     ->with('empresa')
        //     ->orderBy('nome')
        //     ->paginate(30);

        // return view('pages.servicos.list', compact('servicos','integracoes'));
    }

    public function create()
    {
        $empresasID_array = auth()->user()->empresasIdsArray();
        $empresasQuePossuemConfiguracao = EmpresaNFSConfig::whereIn('empresa_id', $empresasID_array)->pluck('empresa_id');

        $empresas = Empresa::whereIn('id', $empresasQuePossuemConfiguracao)->get();
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
