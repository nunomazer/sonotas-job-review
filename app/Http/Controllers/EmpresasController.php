<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmpresaConfigNFSeRequest;
use App\Http\Requests\EmpresaRequest;
use App\Models\Empresa;
use App\Models\EmpresaNFSConfig;
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

    public function createConfigNFSe(Empresa $empresa)
    {
        return view('pages.empresas.edit-nfse', compact('empresa'));
    }

    public function editConfigNFSe(Empresa $empresa, EmpresaNFSConfig $nfseConfig)
    {
        return view('pages.empresas.edit-nfse', compact('empresa', 'nfseConfig'));
    }

    public function storeConfigNFSe(EmpresaConfigNFSeRequest $request, Empresa $empresa)
    {
        $nfseConfig = new EmpresaNFSConfig($request->toArray());
        $empresa = $this->empresaService->createConfigNFSe($empresa, $nfseConfig->toArray());

        return redirect()->route('empresas.list', )
            ->with(['success' => 'Configurações de NFSe da empresa '.$empresa->nome.' atualizadas com successo !']);
    }

    public function updateConfigNFSe(EmpresaConfigNFSeRequest $request, Empresa $empresa, EmpresaNFSConfig $nfseConfig)
    {
        $nfseConfig->fill($request->toArray());
        $empresa = $this->empresaService->updateConfigNFSe($empresa, $nfseConfig);


        return redirect()->route('empresas.list', )
            ->with(['success' => 'Configurações de NFSe da empresa '.$empresa->nome.' atualizadas com successo !']);
    }

}
