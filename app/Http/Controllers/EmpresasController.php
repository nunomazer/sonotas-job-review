<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmpresaAssinaturaRequest;
use App\Http\Requests\EmpresaConfigNFSeRequest;
use App\Http\Requests\EmpresaRequest;
use App\Models\CartaoCredito;
use App\Models\Empresa;
use App\Models\EmpresaAssinatura;
use App\Models\EmpresaNFSConfig;
use App\Models\Plan;
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

    public function update(EmpresaRequest $request, Empresa $empresa)
    {
        $empresa->fill($request->toArray());
        $empresa = $this->empresaService->update($empresa);

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

    public function createAssinatura(Empresa $empresa)
    {
        $plans = Plan::where('active', true)->get();
        return view('pages.empresas.edit-assinatura', compact('empresa', 'plans'));
    }

    public function editAssinatura(Empresa $empresa, EmpresaAssinatura $assinatura)
    {
        $plans = Plan::where('active', true)->get();
        return view('pages.empresas.edit-assinatura', compact('empresa', 'plans', 'assinatura'));
    }

    public function storeAssinatura(EmpresaAssinaturaRequest $request, Empresa $empresa)
    {
        $cc = new CartaoCredito();
        $cc->number = $request->cartao_credito;
        $cc->holder = $request->nome;
        $cc->validate = $request->validade;
        $cc->security_code = $request->codigo;

        $plan = Plan::find($request->plan_id);

        $empresa = $this->empresaService->createAssinatura($empresa, $plan, $cc);

        return redirect()->route('empresas.list', )
            ->with(['success' => 'Escolha de plano feita com sucesso para empresa '.$empresa->nome]);
    }

    public function updateAssinatura(EmpresaAssinaturaRequest $request, Empresa $empresa, EmpresaAssinatura $assinatura)
    {
        // não foi paga a assinatura quando escolheu o plano, é como se estivese criando do zero
        // porém pode estar alterando o plano anteriormente escolhido que não foi pago, precisa fazer corretamente
        // o set de plan_id
        if ($assinatura->status == null) {
            $cc = new CartaoCredito();
            $cc->number = $request->cartao_credito;
            $cc->holder = $request->nome;
            $cc->validate = $request->validade;
            $cc->security_code = $request->codigo;

            $plan = Plan::find($request->plan_id);

            $assinatura->plan_id = $request->plan_id;

            $empresa = $this->empresaService->createAssinatura($empresa, $plan, $cc);
        }

        return redirect()->route('empresas.list', )
            ->with(['success' => 'Escolha de plano feita com sucesso para empresa '.$empresa->nome]);
    }

}
