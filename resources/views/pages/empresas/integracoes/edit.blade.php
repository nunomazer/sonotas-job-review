@extends('layouts.app')

@section('page-pretitle', (isset($integracao) ? $integracao->empresa->nome : 'Cadastro'))
@section('page-title', 'Integração')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>
                {{(isset($integracao) ? $integracao->driver : 'Nova integração')}}
            </h2>
        </div>
        <div class="card-body">
            <label>Descrição</label>
            {{ $integracao->name }}
        </div>
    </div>
@endsection
