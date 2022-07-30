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
                        <th class="table-sort" data-sort="sort-name">Nome</th>
                        <th>
                            Plano
                        </th>
                        <th>
                            Integrações
                        </th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody class="table-tbody">
                        @foreach($empresas as $empresa)
                            <tr>
                                <td>
                                    <span class="mx-1 {{ $empresa->ativo ? 'status-green' : '' }}">
                                        <span class="status-dot"></span>
                                    </span>

                                    <a href="{{route('empresas.edit', $empresa)}}">
                                        {{ $empresa->nome }}
                                    </a>
                                </td>
                                <td>
                                    @if($empresa->plano)
                                    @else
                                        <a href="#" class="btn btn-sm btn-warning">
                                            Assinar plano
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    @foreach($empresa->integracoes as $integracao)
                                        <span class="mx-1 {{ $integracao->ativo ? 'status-green' : '' }}">
                                            <span class="status-dot"></span>
                                        </span>
                                        <a href="{{ route('empresas.integracoes.edit', [$empresa, $integracao]) }}">
                                            {{ $integracao->driver }}
                                        </a>
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{route('empresas.edit', $empresa)}}" class="btn btn-sm">
                                        Nova integração
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
