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
                        <th class="table-sort" data-sort="sort-name">Empresa</th>
                        <th class="table-sort" data-sort="sort-name">
                            Cliente
                        </th>
                        <th>Data</th>
                        <th>Descrição</th>
                        <th>Valor</th>
                        <th>Integração</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody class="table-tbody">
                        @foreach($vendas as $venda)
                            <tr>
                                <td>
                                    {{ $venda->empresa->nome }}
                                </td>
                                <td>
                                    {{ $venda->cliente->nome }}
                                </td>
                                <td>
                                    {{ $venda->emitido_em->format('d/m/Y H:i:s') }}
                                </td>
                                <td>
                                    @foreach($venda->itens_servico as $item)
                                        {{ $item->servico->nome }}
                                        <br/>
                                    @endforeach
                                </td>
                                <td>
                                    {{ number_format($venda->valor, 2, ',', '.') }}
                                </td>
                                <td>
                                    {{ $venda->integracao->nome ?? '' }}
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
