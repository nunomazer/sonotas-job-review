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
                                        {{ $integracao->ativo ? '(ativo)' : '(inativo)' }}
                                        <a href="{{ route('empresas.integracoes.edit', [$empresa, $integracao]) }}">
                                            {{ $integracao->driver }}
                                        </a>
                                    @endforeach
                                </td>
                                <td>
                                    @if ($empresa->onboarding()->inProgress())
                                        <ol>
                                            @foreach ($empresa->onboarding()->steps as $step)
                                                <li>
                                                    @if($step->complete())
                                                        <i class="fa fa-check-square-o fa-fw"></i>
                                                        <s>{{ $step->title }}</s>
                                                    @else
                                                        <i class="fa fa-square-o fa-fw"></i>
                                                        {{ $step->title }} <br/>
                                                        <a class="btn btn-sm" href="{{ $step->link }}" {{ $step->complete() ? 'disabled' : '' }}>
                                                            {{ $step->cta }}
                                                        </a>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ol>
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
