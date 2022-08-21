@extends('layouts.app')

@section('page-pretitle', 'Listagem')
@section('page-title', 'Clientes')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-actions">
                <a href="#" class="btn btn-sm btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <circle cx="12" cy="12" r="9"></circle>
                        <line x1="9" y1="12" x2="15" y2="12"></line>
                        <line x1="12" y1="9" x2="12" y2="15"></line>
                    </svg>

                    Novo cliente
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
                        <th>Telefone</th>
                        <th>E-mail</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody class="table-tbody">
                        @foreach($clientes as $cliente)
                            <tr>
                                <td>
                                    {{ $cliente->empresa->nome }}
                                </td>
                                <td>
                                    <a href="{{route('empresas.edit', $cliente)}}">
                                        {{ $cliente->nome }}
                                    </a>
                                </td>
                                <td>
                                    ({{ $cliente->telefone_ddd }}) {{ $cliente->telefone_num }}
                                </td>
                                <td>
                                    {{ $cliente->email }}
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
