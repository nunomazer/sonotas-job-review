@extends('layouts.app')

@section('page-pretitle', 'Detalhes')
@section('page-title', 'Nota Fiscal de Serviço'))

@section('content')

<td class="card">
    <div class="card-header">
        {{ $nfse->venda->empresa->nome }}
    </div>
    <div class="card-header">
        <h2>
            #{{ $nfse->id }} -
            <small class="badge {{$nfse->status == \App\Services\Sped\SpedStatus::CONCLUIDO ? 'bg-green-lt' : ''}}">
                {{ $nfse->status }}
            </small>
        </h2>
        <div class="card-actions">
            <div class="row">
                @if($nfse->canCancel)
                <div class="col">
                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modalCancelamento">
                        Cancelar
                    </button>
                </div>
                @endif
                <div class="col">
                    <a href="{{ route('notas-servico.list') }}" class="btn btn-sm btn-secondary">
                        Voltar
                    </a>
                </div>
            </div>
        </div>
    </div>
    <tr class="card-body">
        <div class="row">
            <div class="col-3 col-md-1">
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
                        @if ($nfse->status == \App\Services\Sped\SpedStatus::CONCLUIDO)
                            em processamento
                        @else
                            disponível quando NF estiver concluída
                        @endif
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
                    @if ($nfse->status == \App\Services\Sped\SpedStatus::CONCLUIDO)
                        em processamento
                    @else
                        disponível quando NF estiver concluída
                    @endif
                </span>
                @endif
            </div>
        </div>

        <h3 class="mt-3 border-top pt-2">Histórico</h3>

        <table class="table">
            <thead>
                <tr class="small">
                    <td>Em</td>
                    <td>Status</td>
                    <td>Mensagem</td>
                </tr>
            </thead>
            @foreach(collect($nfse->status_historico)->sortByDesc('created_at') as $type => $hist)
                @if ($type != 'erro')
                    <tr class="small">
                        <td>
                            {{ date('d/m/Y H:i:s', strtotime($hist['created_at'])) }}
                        </td>
                        <td>
                            {{ $type }}
                        </td>
                        <td>
                            @if ($type == 'rejeitado')
                                {{ $hist['error']['mensagem']  }}
                            @else
                                {{$hist['message'] ?? ''}}
                            @endif
                        </td>
                    </tr>
                @endif
            @endforeach
        </table>
    </div>
</div>

@if($nfse->canCancel)
<div class="modal fade" id="modalCancelamento" tabindex="-1" role="dialog" aria-labelledby="modalCancelamentoLabel" aria-hidden="true">
    <form method="POST" action="{{ route('notas-servico.cancelar', $nfse) }}">
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCancelamentoLabel">Cancelamento de nota</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label>Motivo:</label>
                    <textarea class="form-control" minlength="12" name="cancelamento_motivo" required style="width: 100%; min-height:60px"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Cancelar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </form>
</div>

@endif
@endsection
