<?php

namespace App\Http\Controllers;

use App\Http\Requests\NFSeRequest;
use App\Models\NFSe;
use App\Models\Venda;
use App\Models\VendaItem;
use App\Services\NFSeService;
use App\Services\Sped\SpedService;
use App\Services\VendasService;
use Illuminate\Http\Request;

class VendasController extends Controller
{

    public function __construct()
    {
    }

    public function index()
    {
        $vendas = Venda::whereIn('empresa_id', auth()->user()->empresas->pluck('id')->toArray())
            ->orderBy('data_transacao', 'desc')
            ->paginate(30);
        return view('pages.vendas.list', compact('vendas'));
    }

    public function create()
    {
        $empresas = auth()->user()->empresas;
        return view('pages.vendas.edit', compact('empresas'));
    }

    public function edit(Venda $venda)
    {
        return view('pages.vendas.edit', compact('venda'));
    }

    public function store()
    {
        $vendasService = new VendasService();

        $servicos = collect(request()->get('servico'))
            ->map(function ($item) {
                return new VendaItem([
                    'item_id'   => $item['id'],
                    'qtde'      => $item['qtde'],
                    'valor'     => $item['valor'],
                    'desconto'  => $item['desconto'],
                    'tipo_documento' => request()->get('tipo_documento', SpedService::DOCTYPE_NFSE),
                ]);
            });

        $venda = $vendasService->create(request()->all(), $servicos->all());

        return redirect(route('vendas.list'))->with('success', 'Venda inserida com sucesso');
    }
    
    public function update()
    {
        $vendasService = new VendasService();

        $servicos = collect(request()->get('servico'))
            ->map(function ($item) {
                return new VendaItem([
                    'item_id'   => $item['id'],
                    'qtde'      => $item['qtde'],
                    'valor'     => $item['valor'],
                    'desconto'  => $item['desconto'],
                    'tipo_documento' => request()->get('tipo_documento', SpedService::DOCTYPE_NFSE),
                ]);
            });
        
        $vendasService->update(request()->all(), $servicos->all());

        return redirect(route('vendas.list'))->with('success', 'Venda atualizada com sucesso');
    }

    /**
     * Disparo manual de uma NF
     * @return void
     */
    public function emitirNF(Venda $venda)
    {
        $vendaService =  new VendasService();

        // TODO refatorar para os demais tipos de doc fiscal
        if($venda->tipo_documento == SpedService::DOCTYPE_NFSE) {
            $vendaService->gerarEmitirNFSe($venda);
        }

        return redirect()->back()->with('success', 'NF enviada para processamento');
    }
}
