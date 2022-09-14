@extends('layouts.app')

@section('page-pretitle', 'Listagem')
@section('page-title', 'Vendas')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-actions">
                <a href="{{route('vendas.create')}}" class="btn btn-sm btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <circle cx="12" cy="12" r="9"></circle>
                        <line x1="9" y1="12" x2="15" y2="12"></line>
                        <line x1="12" y1="9" x2="12" y2="15"></line>
                    </svg>

                    Nova venda
                </a>
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
                        <th>NF</th>
                        <th>Serviços/Produtos</th>
                        <th class="text-end">Valor</th>
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
                                        @if($venda->documento_fiscal)
                                            <span class="badge badge-outline text-success">
                                                <a href="{{route('notas-servico.show', $venda->documento_fiscal->id) }}"
                                                   data-bs-toogle="tooltip" title="NF {{$venda->documento_fiscal->id}} emitida em {{$venda->documento_fiscal->emitido_em->format('d/m/Y - H:i:s')}}">
                                                    # {{$venda->documento_fiscal->id}}
                                                </a>
                                            </span>
                                        @else
                                            @if(isset($venda->data_emissao_planejada))
                                                <span class="badge badge-outline text-secondary" data-bs-toogle="tooltip" title="Emissão NF planejada">
                                                    {{ $venda->data_emissao_planejada->format('d/m/Y H:i') }}
                                                </span>
                                            @else
                                                <small class="text-muted">
                                                    não planejada
                                                </small>
                                            @endif
                                        @endif
                                    </small>
                                </td>
                                <td>
                                    @foreach($venda->itens as $item)
                                        {{ $item->servico->nome }}
                                        <br/>
                                    @endforeach
                                </td>
                                <td class="text-end">
                                    {{ number_format($venda->valor, 2, ',', '.') }}
                                </td>
                                <td>
                                    {{ $venda->driver ?? '' }}
                                </td>
                                <td>
                                    @if($venda->documento_fiscal == false)
                                        <form method="POST" action="{{route('vendas.nf.emitir', $venda)}}">
                                            @csrf
                                            <button class="btn btn-sm">
                                                Emitir NF
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
