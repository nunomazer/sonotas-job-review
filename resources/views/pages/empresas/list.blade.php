@extends('layouts.app')

@section('page-pretitle', 'Listagem')
@section('page-title', 'Minhas Empresas')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-actions">
                <a href="#" class="btn btn-sm btn-primary">
                    Nova empresa
                </a>
            </div>
        </div>
        <div class="card-body">
            <div id="table-default" class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th class="table-sort" data-sort="sort-name">Ativa</th>
                        <th class="table-sort" data-sort="sort-name">Nome</th>
                        <th>Integrações</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody class="table-tbody">
                        @foreach($empresas as $empresa)
                            <tr>
                                <td>
                                    {{ $empresa->ativo ? 'Sim' : 'Não' }}
                                </td>
                                <td>
                                    {{ $empresa->nome }}
                                </td>
                                <td>
                                    @foreach($empresa->integracoes as $integracao)
                                        <a href="{{ route('empresas.integracoes.edit', [$empresa, $integracao]) }}">
                                            {{ $integracao->driver }}
                                        </a>
                                        <br/>
                                    @endforeach
                                </td>
                                <td>
                                    <a href="#" class="btn btn-sm">Nova Integração</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
