@extends('layouts.app')

@section('page-pretitle', 'OAuth')
@section('page-title', 'Sucesso')

@section('content')
    <div  class="container-tight py-4">
        <div class="card">
            <div class="card-header text-danger">
                <h1>Erro :(</h1>
            </div>
            <div class="card-body">
                <h2>Não foi possível realizar a autenticação.</h2>
                <h3 class="text-warning">{{$message}}</h3>
            </div>
        </div>
    </div>
@endsection
