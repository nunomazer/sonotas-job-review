@extends('layouts.app')

@section('page-pretitle', 'Listagem')
@section('page-title', 'Notas Fiscais de Serviços')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-actions">
                <a href="#" class="btn btn-sm btn-primary">
                    Nova venda
                </a>
            </div>
        </div>
        <div class="card-body">
            <div id="table-default" class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th class="table-sort" data-sort="sort-name">Prestador</th>
                        <th class="table-sort" data-sort="sort-name">
                            Tomador
                        </th>
                        <th>Data Serviço</th>
                        <th>Serviços</th>
                        <th>Valor</th>
                        <th>Integração</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody class="table-tbody">
                        @foreach($nfses as $nfse)
                            <tr>
                                <td>
                                    {{ $nfse->empresa->nome }}
                                </td>
                                <td>
                                    {{ $nfse->cliente->nome }}
                                </td>
                                <td>
                                    {{ $nfse->emitido_em->format('d/m/Y H:i:s') }}
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
                                    {{ $nfse->integracao->driver ?? '' }}
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
