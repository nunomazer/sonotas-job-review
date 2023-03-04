<?php

namespace App\Http\Controllers;

use App\DataTables\AfiliadoDataTable;
use App\Exceptions\DocumentoDuplicadoCriarAfiliadoException;
use App\Http\Requests\AfiliadoRequest;
use App\Http\Requests\EmpresaAssinaturaRequest;
use App\Http\Requests\EmpresaConfigNFSeRequest;
use App\Models\Afiliado;
use App\Models\CartaoCredito;
use App\Models\Empresa;
use App\Models\Certificado;
use App\Models\EmpresaAssinatura;
use App\Models\EmpresaNFSConfig;
use App\Models\Plan;
use App\Services\AfiliadoService;

class AfiliadosController extends Controller
{
    protected AfiliadoService $afiliadoService;

    public function __construct()
    {
        $this->afiliadoService = new AfiliadoService();
    }

    public function index(AfiliadoDataTable $dataTable)
    {
        return $dataTable->render('pages.afiliados.list');
    }

    public function create()
    {
        return view('pages.afiliados.edit');
    }

    public function store(AfiliadoRequest $request)
    {
        try {
            $afiliado = $this->afiliadoService->create($request->toArray());

        } catch (DocumentoDuplicadoCriarAfiliadoException $exception) {
            return back()
                ->withInput()
                ->withErrors($exception->getMessage());
        }

        return redirect()->route('afiliados.list', )
            ->with(['success' => 'Afiliado '.$afiliado->nome.' criado com successo !']);
    }

    public function edit(Afiliado $afiliado)
    {
        return view('pages.afiliados.edit', compact('afiliado'));
    }

    public function update(AfiliadoRequest $request, Afiliado $afiliado)
    {
        $afiliado->fill($request->toArray());
       
        $afiliado = $this->afiliadoService->update($afiliado);

        return redirect()->route('afiliados.list', )
            ->with(['success' => 'Afiliado '.$afiliado->nome.' atualizado com successo !']);
    }
}