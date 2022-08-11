@extends('layouts.app')

@section('page-pretitle', 'Listagem')
@section('page-title', 'Vendas')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-actions">

            </div>
        </div>
        <div class="card-body">
            <div id="table-default" class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th class="table-sort" data-sort="sort-name">Empresa</th>
                        <th class="table-sort" data-sort="sort-name">
                            Cliente
                        </th>
                        <th>Data Transação</th>
                        <th>Emissão Planejada NF</th>
                        <th></th>
                        <th>Serviço/Produto</th>
                        <th>Valor</th>
                        <th>Integração</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody class="table-tbody">
                        @foreach($vendas as $venda)
                            <tr>
                                <td>
                                    {{ $venda->id }}
                                </td>
                                <td>
                                    {{ $venda->empresa->nome }}
                                </td>
                                <td>
                                    {{ $venda->cliente->nome }}
                                </td>
                                <td>
                                    {{ $venda->data_transacao->format('d/m/Y H:i') }}
                                </td>
                                <td>
                                    {{ $venda->data_emissao_planejada->format('d/m/Y H:i') }}
                                </td>
                                <td>
                                    <span class="badge badge-outline badge-sm text-{{ $venda->documento_fiscal ? 'blue' : 'warning' }}">
                                        @if($venda->documento_fiscal)
                                            <a href="{{route('notas-servico.show', $venda->documento_fiscal->id) }}">
                                                Detalhes NFSe
                                            </a>
                                        @endif
                                    </span>
                                </td>
                                <td>
                                    @foreach($venda->itens as $item)
                                        {{ $item->servico->nome }}
                                        <br/>
                                    @endforeach
                                </td>
                                <td>
                                    {{ number_format($venda->valor, 2, ',', '.') }}
                                </td>
                                <td>
                                    {{ $venda->driver ?? '' }}
                                </td>
                                <td>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
