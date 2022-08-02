@extends('layouts.app')

@section('page-pretitle', 'Listagem')
@section('page-title', 'Minhas Empresas')

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
                        <th>Configuração NFSe</th>
                        <th>Integrações</th>
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
                                    @include('pages.empresas.partials.assinatura-status')
                                </td>
                                <td>
                                    @if($empresa->configuracao_nfse)
                                        <span class="mx-1 status-green">
                                            <span class="status-dot"></span>
                                        </span>
                                        <a href="{{route('empresas.nfse.edit', [$empresa, $empresa->configuracao_nfse])}}">
                                            Dados NFSe
                                        </a>
                                    @else
                                        <span class="mx-1 status-warning">
                                            <span class="status-dot"></span>
                                        </span>
                                        <a href="{{route('empresas.nfse.create', [$empresa])}}">
                                            Configurar
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    @forelse($empresa->integracoes as $integracao)
                                        <span class="mx-1 {{ $integracao->ativo ? 'status-green' : '' }}">
                                            <span class="status-dot"></span>
                                        </span>
                                        <a href="{{ route('empresas.integracoes.edit', [$empresa, $integracao]) }}">
                                            {{ $integracao->driver }}
                                        </a>
                                    @empty
                                        <span class="mx-1 status-warning">
                                            <span class="status-dot"></span>
                                        </span>
                                        Nenhuma integração
                                    @endforelse
                                </td>
                                <td>
                                    <a href="{{route('empresas.edit', $empresa)}}" class="btn btn-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <circle cx="12" cy="12" r="9"></circle>
                                            <line x1="9" y1="12" x2="15" y2="12"></line>
                                            <line x1="12" y1="9" x2="12" y2="15"></line>
                                        </svg>

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
