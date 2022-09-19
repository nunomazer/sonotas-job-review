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
                <div class="col-1 ">
                    Cliente
                </div>
                <div class="col-9 border">
                    <a href="{{ route('clientes.edit', $nfse->venda->cliente) }}">
                        {{ $nfse->venda->cliente->nome }}
                    </a>
                </div>

                <div class="col-1 ">
                    Venda
                </div>
                <div class="col-1 border">
                    {{ $nfse->venda->id }}
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-1 ">
                    Dt NFSe
                </div>
                <div class="col-2 border">
                    {{ $nfse->created_at->format('d/m/Y H:i') }}
                </div>

                <div class="col-1 ">
                    Dt Venda
                </div>
                <div class="col-2 border ">
                    {{ $nfse->venda->data_transacao->format('d/m/Y') }}
                </div>

                <div class="col-1 offset-3 ">
                    Valor NF
                </div>
                <div class="col-2 border">
                    {{ number_format($nfse->valor, 2, ',', '.') }}
                </div>
            </div>

            <h3 class="mt-3 border-top pt-2">Serviços</h3>
            <div class="row mt-3">
                @foreach($nfse->itens_servico as $item)
                    <div class="col-1 ">
                        Descrição
                    </div>
                    <div class="col-3 border">
                        {{ $item->servico->nome }}
                    </div>
                    <div class="col-1 ">
                        Quantidade
                    </div>
                    <div class="col-1 border">
                        {{ number_format($item->qtde, 2, ',', '.') }}
                    </div>
                    <div class="col-1 ">
                        Valor
                    </div>
                    <div class="col-2 border">
                        {{ number_format($item->valor, 2, ',', '.') }}
                    </div>
                    <div class="col-1 ">
                        Total
                    </div>
                    <div class="col-2 border">
                        {{ number_format($item->valor * $item->qtde, 2, ',', '.') }}
                    </div>
                @endforeach
            </div>

            <h3 class="mt-3 border-top pt-2">Documentos</h3>
            <div class="row mt-3">
                <div class="col-1 ">
                    XML
                </div>
                <div class="col-11 border">
                    @if($nfse->arquivo_pdf_downloaded)
                        <a href="{{ route('notas-servico.download.xml', $nfse) }}">
                            clique para baixar
                        </a>
                    @else
                        <span class="text-muted">
                            em processamento
                        </span>
                    @endif
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-1 ">
                    PDF
                </div>
                <div class="col-11 border">
                    @if($nfse->arquivo_pdf_downloaded)
                        <a href="{{ route('notas-servico.download.pdf', $nfse) }}">
                            clique para baixar
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
