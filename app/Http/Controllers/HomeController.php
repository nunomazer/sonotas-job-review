<?php

namespace App\Http\Controllers;

use App\Models\Servico;
use App\Services\EstatisticasService;
use App\Services\Sped\SpedService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data_inicial = now()->startOfMonth()->startOfDay();
        $data_final = now()->endOfMonth()->endOfDay();
        $estatisticasService = new EstatisticasService(auth()->user(), $data_inicial, $data_final);
        $estatisticas = $estatisticasService->calcularEstatisticas(true);

        // TODO refatorar isso aqui
        $servicosMaisVendidos = Servico::select('servicos.id', 'servicos.nome',
                    DB::raw('SUM(venda_item.qtde) as qtde'), DB::raw('SUM(venda_item.qtde * venda_item.valor) as valor'))
            ->join('venda_item', 'venda_item.item_id', '=', 'servicos.id')
            ->join('vendas', 'vendas.id', '=', 'venda_item.venda_id')
            ->where('venda_item.tipo_documento', SpedService::DOCTYPE_NFSE)
            ->whereBetween('vendas.data_transacao', [$data_inicial, $data_final])
            ->groupBy('servicos.nome', 'servicos.id')
            ->get();

        return view('pages.dashboard.painel', compact('estatisticas', 'servicosMaisVendidos'));
    }
}
