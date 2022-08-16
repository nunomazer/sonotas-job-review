<?php

namespace App\Http\Controllers;

use App\Services\EstatisticasService;
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
        $estatisticasService = new EstatisticasService();
        $estatisticas['empresas_ativas'] =$estatisticasService->getEmpresasAtivas(auth()->user());

        return view('pages.dashboard.painel', compact('estatisticas'));
    }
}
