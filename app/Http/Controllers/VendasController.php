<?php

namespace App\Http\Controllers;

use App\Http\Requests\NFSeRequest;
use App\Models\NFSe;
use App\Models\Venda;
use App\Services\NFSeService;

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

}
