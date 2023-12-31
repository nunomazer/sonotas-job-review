@extends('layouts.app')

@section('page-pretitle', 'Integração')
@section('page-title', 'Cadastro'))

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>
                Nova integração
            </h2>
            <!-- <div class="card-actions">
                <a href="{{ route('empresas.list') }}" class="btn btn-sm btn-secondary">
                    Voltar
                </a>
            </div> -->
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('empresas.integracoes.store', [$empresa]) }}">
                @csrf

                <input type="hidden" value="{{ old('driver', $integracao->name()) }}" name="driver">

                <div class="row">
                    <div class="mb-3 col-2">
                        <div class="form-label">Ativo</div>
                        <label class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" value="1" name="ativo"
                                {{ old('ativo', true) ? 'checked' : '' }}
                            >
                        </label>
                    </div>
                    <div class="mb-3 col-2">
                        <div class="form-label">Transmissão automática</div>
                        <label class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" value="1" name="transmissao_automatica"
                                {{ old('transmissao_automatica', true) ? 'checked' : '' }}
                            >
                        </label>
                    </div>
                    <div class="mb-3 col-2">
                        <div class="form-label">Apenas dias úteis</div>
                        <label class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" value="1" name="transmissao_apenas_dias_uteis"
                                {{ old('transmissao_apenas_dias_uteis', false) ? 'checked' : '' }}
                            >
                        </label>
                    </div>

                    <div class="mb-3 col-2">
                        <label for="data_inicio" class="form-label">Transmissão após</label>
                        <input type="number" class="form-control" name="transmissao_frequencia" required aria-describedby="transmissaoFrequenciaHelp"
                               value="{{ old('transmissao_frequencia', 1) }}"
                        >
                        <div id="transmissaoFrequenciaHelp" class="form-text">Exemplo 2</div>
                    </div>
                    <div class="mb-3 col-2">
                        <div class="form-label">Período</div>
                        <select class="form-select" name="transmissao_periodo">
                            <option value="hour">Hora</option>
                            <option value="day">Dia</option>
                            <option value="month" selected>Mês</option>
                            <option value="year">Ano</option>
                        </select>
                        <div class="form-text">Exemplo Dia</div>
                    </div>

                    <div class="mb-3 col-2">
                        <label for="data_inicio" class="form-label">Data de início</label>
                        <input type="date" class="form-control" name="data_inicio" aria-describedby="dataInicioHelp"
                               value="{{ old('data_inicio', now()->format('Y-m-d')) }}"
                        >
                        <div id="nameHelp" class="form-text">No formato dd/mm/aaaa, exemplo: 19/07/2022.</div>
                    </div>
                    <div class="mb-3 col-6">
                        <label for="name" class="form-label">Nome / descrição</label>
                        <input type="text" class="form-control" name="name" aria-describedby="nameHelp"
                            value="{{ old('name', $integracao->name()) }}"
                        >
                        <div id="nameHelp" class="form-text">Descrição para identificar a integração.</div>
                    </div>

                    <div class="mb-3 col-3">
                        <div class="form-label">Tipo de documento</div>
                        <select class="form-select" name="tipo_documento">
                            <option value=""></option>
                            <option value="{{\App\Services\Sped\SpedService::DOCTYPE_NFSE}}">NF de Serviço</option>
                            <option value="{{\App\Services\Sped\SpedService::DOCTYPE_NFE}}">NF de Produto</option>
                        </select>
                    </div>

                    @foreach($integracao->fields() as $field)
                        <div class="mb-3 col-6">
                            <label for="{{$field['name']}}" class="form-label required">{{$field['label']}}</label>
                            <input type="text" class="form-control" name="fields[{{$field['name']}}]" aria-describedby="nameHelp"
                                value="{{ old($field['name'], '') }}"
                            >
                            <div id="nameHelp" class="form-text">{{$field['helptext']}}</div>
                        </div>
                    @endforeach
                </div>


                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="{{ route('empresas.list') }}" class="btn btn-secondary">
                    Voltar
                </a>
            </form>
        </div>
    </div>
@endsection
