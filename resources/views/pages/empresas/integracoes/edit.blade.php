@extends('layouts.app')

@section('page-pretitle', 'Integração')
@section('page-title', (isset($integracao) ? $integracao->empresa->nome : 'Cadastro'))

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>
                {{(isset($integracao) ? $integracao->driver : 'Nova integração')}}
            </h2>
            <div class="card-actions">
                <a href="{{ route('empresas.list') }}" class="btn btn-sm btn-secondary">
                    Voltar
                </a>
            </div>
        </div>
        <div class="card-body">
            <form>
                <div class="row">
                    <div class="mb-3 col-2">
                        <div class="form-label">Ativo</div>
                        <label class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" value="1" name="ativo">
                        </label>
                    </div>
                    <div class="mb-3 col-2">
                        <div class="form-label">Transmissão automática</div>
                        <label class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" value="1" name="transmissao_automatica">
                        </label>
                    </div>
                    <div class="mb-3 col-2">
                        <div class="form-label">Apenas dias úteis</div>
                        <label class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" value="1" name="transmissao_apenas_dias_uteis">
                        </label>
                    </div>
                    <div class="mb-3 col-3">
                        <label for="data_inicio" class="form-label">Transmitir após</label>
                        <input type="text" class="form-control" name="data_inicio" aria-describedby="transmitirAposHelp"
                               value="{{ old('data_inicio', $integracao->data_inicio->format('d/m/Y')) }}"
                        >
                        <div id="transmitirAposHelp" class="form-text">Período para transmitir após venda realizada.</div>
                    </div>
                    <div class="mb-3 col-3">
                        <label for="data_inicio" class="form-label">Data de início</label>
                        <input type="text" class="form-control" name="data_inicio" aria-describedby="dataInicioHelp"
                               value="{{ old('data_inicio', $integracao->data_inicio->format('d/m/Y')) }}"
                        >
                        <div id="nameHelp" class="form-text">No formato dd/mm/aaaa, exemplo: 19/07/2022.</div>
                    </div>
                    <div class="mb-3 col-12">
                        <label for="name" class="form-label">Nome / descrição</label>
                        <input type="text" class="form-control" name="name" aria-describedby="nameHelp"
                            value="{{ old('name', $integracao->name) }}"
                        >
                        <div id="nameHelp" class="form-text">Descrição para identificar a integração.</div>
                    </div>



                    @foreach($integracao->fields as $field => $value)
                        <div class="mb-3 col-6">
                            <label for="{{$field}}" class="form-label">{{$driver->fieldLabel($field)}}</label>
                            <input type="text" class="form-control" name="field[{{$field}}]" aria-describedby="nameHelp"
                                value="{{ old($field, $value) }}"
                            >
                            <div id="nameHelp" class="form-text">Descrição para identificar a integração.</div>
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
