@extends('layouts.app')

@section('page-pretitle', 'Listagem')
@section('page-title', 'Serviços')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-actions">
                <a href="#" class="btn btn-sm btn-primary">
                    Novo serviço
                </a>
            </div>
        </div>
        <div class="card-body">
            <div id="table-default" class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th class="table-sort" data-sort="sort-name">Empresa</th>
                        <th class="table-sort" data-sort="sort-name">
                            Nome
                        </th>
                        <th>Valor</th>
                        <th>Integrações</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody class="table-tbody">
                        @foreach($servicos as $servico)
                            <tr>
                                <td>
                                    {{ $servico->empresa->nome }}
                                </td>
                                <td>
                                    <span class="mx-1 {{ $servico->ativo ? 'status-green' : '' }}">
                                        <span class="status-dot"></span>
                                    </span>

                                    <a href="{{route('empresas.edit', $servico)}}">
                                        {{ $servico->nome }}
                                    </a>
                                </td>
                                <td>
                                    {{ number_format($servico->valor, 2, ',', '.') }}
                                </td>
                                <td>
                                    @foreach($servico->integracoes as $integracao)
                                        {{ $integracao->driver }} -
                                        {{ $integracao->driver_id }}
                                    @endforeach
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
