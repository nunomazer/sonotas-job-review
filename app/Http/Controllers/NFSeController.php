<?php

namespace App\Http\Controllers;

use App\Http\Requests\NFSeRequest;
use App\Services\NFSeService;

class NFSeController extends Controller
{
    protected $nfseService;

    public function __construct()
    {
        $this->nfseService = new NFSeService();
    }

    public function store(NFSeRequest $request)
    {
        $nfse = $this->nfseService->create($request->toArray());

        // TODO implementar visões
        return dump($nfse);
    }
}
