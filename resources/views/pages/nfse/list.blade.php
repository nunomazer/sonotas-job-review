@extends('layouts.app')

@section('page-pretitle', 'Listagem')
@section('page-title', 'Notas Fiscais de Serviços')

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
                        <th class="table-sort" data-sort="sort-name">Prestador</th>
                        <th class="table-sort" data-sort="sort-name">
                            Tomador
                        </th>
                        <th>Data Serviço</th>
                        <th>Serviços</th>
                        <th>Valor</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody class="table-tbody">
                        @foreach($nfses as $nfse)
                            <tr>
                                <td>
                                    <a href="{{ route('notas-servico.show', $nfse) }}">
                                        {{ $nfse->id }}
                                    </a>
                                </td>
                                <td>
                                    {{ $nfse->venda->empresa->nome }}
                                </td>
                                <td>
                                    <a href="{{ route('clientes.edit', $nfse->venda->cliente) }}">
                                        {{ $nfse->venda->cliente->nome }}
                                    </a>
                                </td>
                                <td>
                                    {{ $nfse->emitido_em->format('d/m/Y H:i') }}
                                </td>
                                <td>
                                    @foreach($nfse->itens_servico as $item)
                                        {{ $item->servico->nome }}
                                        <br/>
                                    @endforeach
                                </td>
                                <td>
                                    {{ number_format($nfse->valor, 2, ',', '.') }}
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
