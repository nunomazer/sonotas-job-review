<?php

namespace App\Http\Controllers;

use App\Http\Requests\NFSeRequest;
use App\Models\NFSe;
use App\Services\NFSeService;

class NFSeController extends Controller
{
    protected $nfseService;

    public function __construct()
    {
        $this->nfseService = new NFSeService();
    }

    public function index()
    {
        $nfses = NFSe::whereIn('empresa_id', auth()->user()->empresas->pluck('id')->toArray())->get();
        return view('pages.nfse.list', compact('nfses'));
    }

    public function store(NFSeRequest $request)
    {
        $nfse = $this->nfseService->create($request->toArray());

        // TODO implementar visões
        return dump($nfse);
    }
}
