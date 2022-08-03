<?php

namespace App\Http\Controllers;

use App\Http\Requests\NFSeRequest;
use App\Models\NFSe;
use App\Services\NFSeService;

class VendasController extends Controller
{

    public function __construct()
    {
    }

    public function index()
    {
        $vendas = NFSe::whereIn('empresa_id', auth()->user()->empresas->pluck('id')->toArray())->get();
        return view('pages.vendas.list', compact('vendas'));
    }

}
