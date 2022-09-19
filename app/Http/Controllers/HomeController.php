<?php

namespace App\Http\Controllers;

use App\Models\Servico;
use App\Services\EstatisticasService;
use App\Services\Sped\SpedService;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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
        $periodo = \request()->get('periodo', now()->format('Y-m'));

        $data_inicial = Carbon::createFromFormat('Y-m', $periodo)->startOfMonth()->startOfDay();
        $data_final = Carbon::createFromFormat('Y-m', $periodo)->endOfMonth()->endOfDay();
        $estatisticasService = new EstatisticasService(auth()->user(), $data_inicial, $data_final);
        $estatisticas = $estatisticasService->calcularEstatisticas(true);

        if (auth()->user()->empresas->count() == 0) {
            Session::flash('error', 'Para iniciar o uso do sistema é necessário cadastrar e configurar
                ao menos uma empresa - <a href="'.route('empresas.list').
                '">clique aqui para iniciar</a>.');
        }

        return view('pages.dashboard.painel', compact('estatisticas'))
            ->with('periodo', $periodo);
    }
}
