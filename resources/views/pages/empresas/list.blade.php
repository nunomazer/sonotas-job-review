@extends('layouts.app')

@section('page-pretitle', 'Listagem')
@section('page-title', 'Minhas Empresas')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-actions">
                <a href="#" class="btn btn-primary">
                    Nova empresa
                </a>
            </div>
        </div>
        <div class="card-body">
            <div id="table-default" class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th><button class="table-sort" data-sort="sort-name">Ativa</button></th>
                        <th><button class="table-sort" data-sort="sort-name">Nome</button></th>
                    </tr>
                    </thead>
                    <tbody class="table-tbody">
                        @foreach($empresas as $empresa)
                            <tr>
                                <td>
                                    {{ $empresa->ativo }}
                                </td>
                                <td>
                                    {{ $empresa->nome }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
