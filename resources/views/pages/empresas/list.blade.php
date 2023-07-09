@extends('layouts.app')

@section('page-pretitle', 'Listagem')
@section('page-title', 'Minhas Empresas')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-actions">
            <a href="{{ route('empresas.create') }}" class="btn btn-sm btn-primary">
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
        <div class="card d-flex flex-column {{$loop->first == false ? 'mt-5' : ''}}">
            <div class="row row-0 flex-fill  ">
                <div class="col-3 col-md-2">
                    <a href="{{route('empresas.edit', $empresa)}}">
                        @if(empty($empresa->logo))
                        <div class="ratio ratio-1x1 placeholder">
                            <div class="placeholder-image"></div>
                        </div>
                        @else
                        <img src="{{asset('storage/'. $empresa->logo) }}" class="w-100 h-100 object-cover" alt="Logo" />
                        @endif
                    </a>
                </div>
                <div class="col">
                    <div class="card-body ">
                        <div class="dropdown d-block d-md-none icon-empresas">
                            <a class="dropdown-toggle " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-settings " width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" />
                                    <circle cx="12" cy="12" r="3" />
                                </svg>
                            </a>
                            <div class="dropdown-menu ">

                                <a id="showTable" class="dropdown-item" href="#" onclick="showTable()">

                                    Integrações
                                </a>
                                <a class="dropdown-item" href="{{route('empresas.integracoes.create.choose-platform', $empresa)}}">
                                    Nova integração
                                </a>
                                <a class="dropdown-item" href="{{route('empresas.edit', $empresa)}}">
                                    Ver empresa
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <h3 class="card-title col-12">
                                <span class="mx-1 {{ $empresa->ativo ? 'status-green' : '' }}">
                                    <span class="status-dot"></span>
                                </span>

                                <a href="{{route('empresas.edit', $empresa)}}">
                                    {{ $empresa->nome }}
                                </a>
                                <a href="{{route('empresas.edit', $empresa)}}" class="d-none d-md-inline-block">

                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-eye icon-tabler icon-tabler-eye" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <circle cx="12" cy="12" r="2" />
                                        <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
                                    </svg>
                                </a>
                            </h3>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-4">
                                @if($empresa->configuracao_nfse)
                                <a href="{{route('empresas.nfse.edit', [$empresa, $empresa->configuracao_nfse])}}" class="btn btn-sm d-block d-md-inline-block btn-info min-w">
                                    Configurar NFSe
                                </a>
                                @else

                                <a href="{{route('empresas.nfse.create', [$empresa])}}" class="btn btn-sm d-block d-md-inline-block btn-warning min-w ">
                                    Configurar NFSe
                                </a>
                                @endif
                            </div>
                            <div class="ms-md-3 col-6 col-md-5 col-md-4">
{{--                                @include('pages.empresas.partials.assinatura-status')--}}
                                Assinatura
                                <br/>
                                @if ($empresa->assinatura == null)
                                    <div class="alert alert-danger">
                                        Nenhuma assinatura em plano identificada, é necessário para emitir NF pela empresa
                                    </div>
                                @else
                                    {{ucwords($empresa->assinatura->plano->driver)}}: Plano {{$empresa->assinatura->plano->name}} - Assinatura: <strong>{{\App\Services\MoneyFlow\MoneyFlowAssinaturaStatus::getNome($empresa->assinatura->status)}}</strong>
                                    <br/>
                                    Docs: {{$empresa->assinatura->featureSaldo(\App\Models\PlanFeature::FEATURE_QTDE_NOTAS)}} / {{$empresa->assinatura->featureBase(\App\Models\PlanFeature::FEATURE_QTDE_NOTAS)}}
                                    <br/>
                                    Expira em: {{$empresa->assinatura->expires_at}}
                                @endif
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-12 d-none d-md-block">
                                <a href="{{route('empresas.integracoes.create.choose-platform', $empresa)}}" class="btn btn-sm ">
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
                        <div class="row mt-1">
                            <div id="table-default" class="table-responsive d-none d-md-block ">
                                <table id="table" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="table-sort" data-sort="sort-name">Integração</th>
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
                                                {{ $empresa->servicos->count() }} Serviços
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
        </div>
        @endforeach
    </div>
</div>
@endsection
@push('js')
<script type="text/javascript">
    function showTable() {
        document.getElementById("table-default").classList.toggle('d-none');
    }
</script>
@endpush
