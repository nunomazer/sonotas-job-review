<?php

namespace App\Http\Controllers;

use App\Exceptions\DocumentoDuplicadoCriarEmpresaException;
use App\Http\Requests\EmpresaAssinaturaRequest;
use App\Http\Requests\EmpresaConfigNFSeRequest;
use App\Http\Requests\EmpresaRequest;
use App\Models\CartaoCredito;
use App\Models\Empresa;
use App\Models\Certificado;
use App\Models\EmpresaAssinatura;
use App\Models\EmpresaNFSConfig;
use App\Models\Plan;
use App\Services\EmpresaService;
use App\Services\Sped\SpedService;

class EmpresasController extends Controller
{
    protected EmpresaService $empresaService;

    public function __construct()
    {
//        $this->middleware('auth');
        $this->empresaService = new EmpresaService();
    }

    public function index()
    {
        $empresas = $this->empresaService->getEmpresasOwner(auth()->user());
        return view('pages.empresas.list', compact('empresas'));
    }

    public function create()
    {
        return view('pages.empresas.edit');
    }

    public function store(EmpresaRequest $request)
    {
        try {
            $empresa = $this->empresaService->create($request->toArray());

            $logo = $request->file('logo');
            if($logo != null){
                $name = uniqid(date('HisYmd'));
                $extension = $logo->extension();
                $nameFile = "{$name}.{$extension}";
				$uploaded = $logo->storeAs('logos', $nameFile,['disk' => 'public']);
                $empresa->fill([
                    'logo' =>  $uploaded
                ]);
                $empresa->save();
            }
        } catch (DocumentoDuplicadoCriarEmpresaException $exception) {
            return back()
                ->withInput()
                ->withErrors($exception->getMessage());
        }

        return redirect()->route('empresas.list', )
            ->with(['success' => 'Empresa '.$empresa->nome.' criada com successo !']);
    }

    public function edit(Empresa $empresa)
    {
        return view('pages.empresas.edit', compact('empresa'));
    }

    public function update(EmpresaRequest $request, Empresa $empresa)
    {
        $logo = $request->file('logo');
        $empresa->fill($request->toArray());
        if($logo != null){
            $name = uniqid(date('HisYmd'));
            $extension = $logo->extension();
            $nameFile = "{$name}.{$extension}";
            $uploaded = $logo->storeAs('logos', $nameFile,['disk' => 'public']);
            $empresa->fill([
                'logo' =>  $uploaded
            ]);
        }

        $empresa = $this->empresaService->update($empresa);

        return redirect()->route('empresas.list', )
            ->with(['success' => 'Empresa '.$empresa->nome.' atualizada com successo !']);
    }

    public function createConfigNFSe(Empresa $empresa)
    {
        $metadados = (new SpedService(SpedService::DOCTYPE_NFSE))->empresaDriver($empresa)->metadadosCidade();

        $metadados = $metadados->data;

        $txt = "<strong>Atenção:</strong> para esta cidade é necessário preencher ";
        $txt .= $metadados['certificado'] ? '<strong>certificado</strong>' : '';
        $txt .= $metadados['login'] ? ', <strong>usuário da prefeitura</strong>' : '';
        $txt .= $metadados['senha'] ? ', <strong>senha da prefeitura</strong>' : '';
        $txt .= ' .. você poderá salvar as configurações porém as NFSe não serão emitidas sem estes dados.';

        session()->flash('warning', $txt);

        return view('pages.empresas.edit-nfse', compact('empresa', 'metadados'));
    }

    public function editConfigNFSe(Empresa $empresa, EmpresaNFSConfig $nfseConfig)
    {
        $metadados = (new SpedService(SpedService::DOCTYPE_NFSE))->empresaDriver($empresa)->metadadosCidade();

        $metadados = $metadados->data;

        $txt = "<strong>Atenção:</strong> para esta cidade é necessário preencher ";
        $txt .= $metadados['certificado'] ? '<strong>certificado</strong>' : '';
        $txt .= $metadados['login'] ? ', <strong>usuário da prefeitura</strong>' : '';
        $txt .= $metadados['senha'] ? ', <strong>senha da prefeitura</strong>' : '';
        $txt .= ' .. você poderá salvar as configurações porém as NFSe não serão emitidas sem estes dados.';

        session()->flash('warning', $txt);

        return view('pages.empresas.edit-nfse', compact('empresa', 'nfseConfig', 'metadados'));
    }

    public function storeConfigNFSe(EmpresaConfigNFSeRequest $request, Empresa $empresa)
    {
        $nfseConfig = new EmpresaNFSConfig($request->toArray());
        $fileCertificado = $request->file('certificadoDigital');
        if($fileCertificado != null){
            $certificado = new Certificado();
            $certificado->file = $fileCertificado;
            $certificado->password = $request->input('certificadoDigitalSenha');
        }
        $empresa = $this->empresaService->createConfigNFSe($empresa, $nfseConfig->toArray(), $certificado ?? null);

        return redirect()->route('empresas.list', )
            ->with(['success' => 'Configurações de NFSe da empresa '.$empresa->nome.' atualizadas com successo !']);
    }

    public function updateConfigNFSe(EmpresaConfigNFSeRequest $request, Empresa $empresa, EmpresaNFSConfig $nfseConfig)
    {
        $nfseConfig->fill($request->toArray());
        $fileCertificado = $request->file('certificadoDigital');
        if($fileCertificado != null){
            $certificado = new Certificado();
            $certificado->file = $fileCertificado;
            $certificado->password = $request->input('certificadoDigitalSenha');
        }
        $empresa = $this->empresaService->updateConfigNFSe($empresa, $nfseConfig, $certificado ?? null);

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

    public function apiGetConfiguracaoNFSe(Empresa $empresa)
    {
        return response()->json($empresa->configuracao_nfse);
    }
}
