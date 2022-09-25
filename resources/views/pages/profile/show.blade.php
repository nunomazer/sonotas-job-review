@extends('layouts.app')

@section('page-pretitle', 'Dados de usuário')
@section('page-title', 'Perfil')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>
                {{ $user->name }}
            </h2>
        </div>
        <div class="card-body">
            <div class="row mb-1">
                <div class="col-3 col-lg-1">
                    E-mail
                </div>
                <div class="strong col-9 col-lg-11">
                    {{ $user->email }}
                </div>
            </div>

            <div class="row mb-1">
                <div class="col-3 col-lg-1">
                    Telefone
                </div>
                <div class="strong col-9 col-lg-11">
                    {{ $user->telefone }}
                </div>
            </div>
            
            <div class="row mb-1">
                <div class="col-3 col-lg-1">
                    CPF
                </div>
                <div class="strong col-9 col-lg-11">
                    {{ $user->cpf }}
                </div>
            </div> 

            <div class="row mb-1">
                <div class="col-3 col-lg-1">
                    Desde
                </div>
                <div class="strong col-9 col-lg-11">
                    {{ $user->created_at->format('d/m/Y') }}
                </div>
            </div>
        </div>
    </div>
@endsection
