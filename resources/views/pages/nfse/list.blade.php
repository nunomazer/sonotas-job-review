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
            {{$dataTable->table()}} 
            {{-- <div id="table-default" class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Data emissão</th>
                        <th>Status</th>
                        <th class="table-sort" data-sort="sort-name">Prestador</th>
                        <th class="table-sort" data-sort="sort-name">
                            Tomador
                        </th>
                        <th>Data venda</th>
                        <th>Serviços</th>
                        <th class="text-end">Valor</th>
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
                                    {{ $nfse->emitido_em->format('d/m/Y H:i') }}
                                </td>
                                <td>
                                    <span class="badge badge-outline text-{{ $nfse->status == \App\Services\Sped\SpedStatus::CONCLUIDO ? 'success' : ($nfse->status == \App\Services\Sped\SpedStatus::PROCESSAMENTO ? 'info' : 'warning')}}">
                                        {{ $nfse->status }}
                                    </span>
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
                                    {{ $nfse->venda->data_transacao->format('d/m/Y') }}
                                </td>
                                <td>
                                    @foreach($nfse->itens_servico as $item)
                                        {{ $item->servico->nome }}
                                        <br/>
                                    @endforeach
                                </td>
                                <td class="text-end">
                                    {{ number_format($nfse->valor, 2, ',', '.') }}
                                </td>
                                <td>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> --}}
        </div>        
    </div>
@endsection
@push('js')
    {{$dataTable->scripts()}}
@endpush