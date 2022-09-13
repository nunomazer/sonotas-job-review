<?php

namespace App\Http\Controllers;

use App\Http\Requests\NFSeRequest;
use App\Models\NFSe;
use App\Models\Venda;
use App\Models\VendaItem;
use App\Services\NFSeService;
use App\Services\Sped\SpedService;
use App\Services\VendasService;

class VendasController extends Controller
{

    public function __construct()
    {
    }

    public function index()
    {
        $vendas = Venda::whereIn('empresa_id', auth()->user()->empresas->pluck('id')->toArray())->get();
        return view('pages.vendas.list', compact('vendas'));
    }

    public function create()
    {
        $empresas = auth()->user()->empresas;
        return view('pages.vendas.edit', compact('empresas'));
    }

    public function store()
    {
        $vendasService = new VendasService();

        $servicos = collect(request()->get('servico'))
            ->map(function ($item) {
                return new VendaItem([
                    'item_id' => $item['id'],
                    'qtde' => $item['qtde'],
                    'valor' => $item['valor'],
                    'tipo_documento' => request()->get('tipo_documento', SpedService::DOCTYPE_NFSE),
                ]);
            });

        $venda = $vendasService->create(request()->all(), $servicos->all());

        return redirect(route('vendas.list'))->with('success', 'Venda inserida com sucesso');
    }
}
