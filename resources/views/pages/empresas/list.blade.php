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

            @foreach($empresas as $empresa)
                <div class="card d-flex flex-column">
                    <div class="row row-0 flex-fill">
                        <div class="col-md-2">
                            <a href="#">
                                <div class="ratio ratio-1x1 placeholder">
                                    <div class="placeholder-image"></div>
                                </div>
    {{--                            <img src="..." class="w-100 h-100 object-cover" alt="Card side image">--}}
                            </a>
                        </div>
                        <div class="col">
                            <div class="card-body row">
                                <h3 class="card-title col-12">
                                    <span class="mx-1 {{ $empresa->ativo ? 'status-green' : '' }}">
                                        <span class="status-dot"></span>
                                    </span>

                                    <a href="{{route('empresas.edit', $empresa)}}">
                                        {{ $empresa->nome }}
                                    </a>
                                </h3>
                                <div class="col">
                                    @if($empresa->configuracao_nfse)
                                        <span class="mx-1 status-green">
                                            <span class="status-dot"></span>
                                        </span>
                                        <a href="{{route('empresas.nfse.edit', [$empresa, $empresa->configuracao_nfse])}}"
                                            class="btn btn-sm btn-info">
                                            Configurar NFSe
                                        </a>
                                    @else
                                        <span class="mx-1 status-warning">
                                            <span class="status-dot"></span>
                                        </span>
                                        <a href="{{route('empresas.nfse.create', [$empresa])}}"
                                           class="btn btn-sm btn-warning">
                                            Configurar NFSe
                                        </a>
                                    @endif
                                </div>

                                <div class="col">
                                    @include('pages.empresas.partials.assinatura-status')
                                </div>

                                <div class="col">
                                    <div class="ms-3">
                                        <a href="{{route('empresas.edit', $empresa)}}" class="btn btn-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <circle cx="12" cy="12" r="9"></circle>
                                                <line x1="9" y1="12" x2="15" y2="12"></line>
                                                <line x1="12" y1="9" x2="12" y2="15"></line>
                                            </svg>

                                            Nova integração
                                        </a>
                                    </div>
                                </div>

                                <div id="table-default" class="table-responsive mt-3">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th class="table-sort" data-sort="sort-name">Integração</th>
                                                <th>Vendas</th>
                                                <th>Serviços</th>
                                                <th>Última importação vendas</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-tbody">
                                            @forelse($empresa->integracoes as $integracao)
                                                <tr>
                                                    <td>
                                                        <span class="mx-1 {{ $integracao->ativo ? 'status-green' : '' }}">
                                                            <span class="status-dot"></span>
                                                        </span>
                                                        <a href="{{ route('empresas.integracoes.edit', [$empresa, $integracao]) }}">
                                                            {{ $integracao->driver }}
                                                        </a>
                                                    </td>

                                                    <td>
                                                        X Vendas
                                                    </td>

                                                    <td>
                                                        X Serviços
                                                    </td>

                                                    <td>
                                                        {{ $integracao->vendas_importadas_em ? $integracao->vendas_importadas_em->format('d/m/Y H:i') : 'Nenhuma importação' }}
                                                    </td>

                                                    <td>
                                                        <form method="POST" action="{{route('empresas.integracoes.servicos.importar', [$empresa, $integracao])}}">
                                                            @csrf
                                                            <button type="submit" class="btn btn-sm">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-forward-up" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                    <path d="M15 13l4 -4l-4 -4m4 4h-11a4 4 0 0 0 0 8h1"></path>
                                                                </svg>

                                                                Importar serviços
                                                            </button>
                                                        </form>
                                                    </td>

                                                </tr>
                                            @empty
                                                <span class="mx-1 status-warning">
                                                    <span class="status-dot"></span>
                                                </span>
                                                Nenhuma integração
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
