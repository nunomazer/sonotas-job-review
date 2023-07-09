<?php

namespace App\Http\Controllers;

use App\Http\Requests\IntegracaoRequest;
use App\Jobs\IntegracaoImportarServicos;
use App\Models\Empresa;
use App\Models\Integracao;
use App\Services\Integra\IntegraService;
use App\Services\ServicoService;
use Illuminate\Http\Request;

class IntegracoesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function createChoosePlatform(Empresa $empresa)
    {
        $platforms = (new IntegraService())->platformsDriverClasses();
        return view('pages.empresas.integracoes.choose', compact('empresa', 'platforms'));
    }

    public function create(Empresa $empresa)
    {
        $this->validate(\request(), [
            'platform' => ['Required'],
        ]);

        $platform = \request()->platform;
        if (class_exists($platform) == false) {
            return back()->withErrors('Integração não está disponível !');
        }

        $integracao = new $platform([]);
        $driver = (new IntegraService())->driver($integracao->name(), $integracao->fields());
        return view('pages.empresas.integracoes.new', compact('empresa', 'integracao', 'driver'));
    }

    public function edit(Empresa $empresa, Integracao $integracao)
    {
        $driver = (new IntegraService())->driver($integracao->driver, $integracao->fields);
        return view('pages.empresas.integracoes.edit', compact('empresa', 'integracao', 'driver'));
    }

    public function update(IntegracaoRequest $request, Empresa $empresa, Integracao $integracao)
    {
        $integracao->update($request->toArray());

        return redirect()->route('empresas.list', )
            ->with(['success' => 'Integração atualizada com successo !']);
    }

    public function store(IntegracaoRequest $request, Empresa $empresa)
    {
        // TODO refatorar para o service
        $request->merge([
            'empresa_id' => $empresa->id,
        ]);
        Integracao::create($request->toArray());

        return redirect()->route('empresas.list', )
            ->with(['success' => 'Integração criada com successo !']);
    }


    /**
     * Coloca na fila a sincronização de serviços para um integração com uma empresa
     *
     * @param Request $request
     * @param Empresa $empresa
     * @param Integracao $integracao
     * @return \Illuminate\Http\RedirectResponse
     */
    public function importFromPlatform(Request $request, Empresa $empresa, Integracao $integracao)
    {
        if ($empresa->configuracao_nfse == null) {
            return redirect()->back()->with('error', 'Não é possível importar serviços de integrações antes de Configurar a NFSe da Empresa');
        }

        $this->dispatch(new IntegracaoImportarServicos($empresa, $integracao));

        return redirect()->back()->with('success', 'Importação de serviços para empresa "'.$empresa->nome.'", da integração "'.$integracao->driver.'" está em execução, ao finalizar o resultado é informado na área de notificações');
    }
}
