<?php

namespace App\Http\Controllers;

use App\Services\EstatisticasService;
use Carbon\Carbon;
use Illuminate\Http\Request;

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

        return view('pages.dashboard.painel', compact('estatisticas'));
    }
}
