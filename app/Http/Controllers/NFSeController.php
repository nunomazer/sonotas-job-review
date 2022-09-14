<?php

namespace App\Http\Controllers;

use App\Http\Requests\NFSeRequest;
use App\Models\NFSe;
use App\Services\NFSeService;
use Illuminate\Support\Facades\Storage;

class NFSeController extends Controller
{
    protected $nfseService;

    public function __construct()
    {
        $this->nfseService = new NFSeService();
    }

    public function index()
    {
        $nfses = NFSe::with('venda')->whereHas('venda', function($q) {
            $q->whereIn('empresa_id', auth()->user()->empresas->pluck('id')->toArray());
        })->get();
        return view('pages.nfse.list', compact('nfses'));
    }

    public function store(NFSeRequest $request)
    {
        $nfse = $this->nfseService->create($request->toArray());

        // TODO implementar visões
        return dump($nfse);
    }

    public function show(NFSe $nfse)
    {
        return view('pages.nfse.show', compact('nfse'));
    }

    public function downloadPdf(NFSe $nfse)
    {
        if ($nfse->arquivo_pdf_downloaded == false) {
            return redirect()->back()->withErrors('Arquivo PDF não está disponível');
        }

        return response()->download(Storage::disk($nfse->disk)->path($nfse->arquivo_pdf));
    }

    public function downloadXml(NFSe $nfse)
    {
        if ($nfse->arquivo_xml_downloaded == false) {
            return redirect()->back()->withErrors('Arquivo XML não está disponível');
        }

        return response()->download(Storage::disk($nfse->disk)->path($nfse->arquivo_xml));
    }
}
