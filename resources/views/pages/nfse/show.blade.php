@extends('layouts.app')

@section('page-pretitle', 'Detalhes')
@section('page-title', 'Nota Fiscal de Serviço'))

@section('content')
<div class="card">
    <div class="card-header">
        <h2>
            #{{ $nfse->id }} -
            <small>{{ $nfse->status }}</small>
        </h2>
        <div class="card-actions">
            <a href="{{ route('notas-servico.list') }}" class="btn btn-sm btn-secondary">
                Voltar
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-3 col-md-1  ">
                Cliente
            </div>
            <div class="col-5 col-md-9 border">
                <a href="{{ route('clientes.edit', $nfse->venda->cliente) }}">
                    {{ $nfse->venda->cliente->nome }}
                </a>
            </div>

            <div class="col-2 col-md-1 text-md-center ">
                Venda
            </div>
            <div class="col-2 col-md-1 border">
                {{ $nfse->venda->id }}
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-3 col-md-1 ">
                Dt NFSe
            </div>
            <div class="col-9 col-md-2 border">
                {{ $nfse->created_at->format('d/m/Y H:i') }}
            </div>

            <div class="col-3 col-md-1 text-md-center ">
                Dt Venda
            </div>
            <div class="col-9 col-md-2 border ">
                {{ $nfse->venda->data_transacao->format('d/m/Y') }}
            </div>

            <div class="col-3 col-md-1 text-md-center  ">
                Valor NF
            </div>
            <div class="mt-2 col-9 mt-md-0 col-md-2 border">
                {{ number_format($nfse->valor, 2, ',', '.') }}
            </div>
        </div>

        <h3 class="mt-3 border-top pt-2">Serviços</h3>
        <div class="row mt-3">
            @foreach($nfse->itens_servico as $item)
            <div class="  col-4 col-md-1 ">
                Descrição
            </div>
            <div class="col-8 col-md-3 border">
                {{ $item->servico->nome }}
            </div>
            <div class="text-md-center col-2 col-md-1 ">
                Quantidade
            </div>
            <div class=" col-8 col-md-1 border">
                {{ number_format($item->qtde, 2, ',', '.') }}
            </div>
            <div class=" text-md-center col-2 col-md-1 ">
                Valor
            </div>
            <div class="col-8 col-md-1 border">
                {{ number_format($item->valor, 2, ',', '.') }}
            </div>
            <div class=" text-md-center col-2 col-md-1 ">
                Desconto
            </div>
            <div class="col-8 col-md-1 border">
                {{ number_format($item->desconto, 2, ',', '.') }}
            </div>
            <div class="text-md-center col-4 col-md-1 ">
                Total
            </div>
            <div class="col-8 col-md-1 border ">
                {{ number_format($item->valor * $item->qtde - $item->desconto, 2, ',', '.') }}
            </div>
            @endforeach
        </div>

        <h3 class="mt-3 border-top pt-2">Documentos</h3>
        <div class="row mt-3">
            <div class="col-3 col-md-1 ">
                XML
            </div>
            <div class="col-9 col-md-9 text-center border border-primary">
                @if($nfse->arquivo_pdf_downloaded)
                <a href="{{ route('notas-servico.download.xml', $nfse) }}">
                    Baixar
                </a>
                @else
                <span class="text-muted">
                    em processamento
                </span>
                @endif
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-3 col-md-1 ">
                PDF
            </div>
            <div class="col-9 col-md-9 text-center border border-primary">
                @if($nfse->arquivo_pdf_downloaded)
                <a href="{{ route('notas-servico.download.pdf', $nfse) }}">
                    Baixar
                </a>
                @else
                <span class="text-muted">
                    em processamento
                </span>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection