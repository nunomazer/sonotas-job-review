@extends('layouts.app')

@section('page-pretitle', 'Listagem')
@section('page-title', 'Serviços')

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

                    Novo serviço
                </a>

<!--                <div class="dropdown">
                    <button class="btn btn-sm btn-info dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-replace" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <rect x="3" y="3" width="6" height="6" rx="1"></rect>
                            <rect x="15" y="15" width="6" height="6" rx="1"></rect>
                            <path d="M21 11v-3a2 2 0 0 0 -2 -2h-6l3 3m0 -6l-3 3"></path>
                            <path d="M3 13v3a2 2 0 0 0 2 2h6l-3 -3m0 6l3 -3"></path>
                        </svg>

                        Importar Serviços
                    </button>
                    <ul class="dropdown-menu">
                        @if($integracoes->count())
                            <li><a class="dropdown-item" href="#">Todas as plataformas</a></li>
                            <li><hr class="dropdown-divider"></li>
                            @foreach($integracoes as $integracao)
                                <li><a class="dropdown-item" href="#">{{ $integracao->driver }}</a></li>
                            @endforeach
                        @else
                            <p>
                                Nenhuma integração configurada
                            </p>
                        @endif
                    </ul>
                </div>-->
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
                                        {{ $integracao->driver }}
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
