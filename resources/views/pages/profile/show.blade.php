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
                <div class="col-2 col-lg-1">
                    E-mail
                </div>
                <div class="strong col-10 col-lg-11">
                    {{ $user->email }}
                </div>
            </div>

            <div class="row mb-1">
                <div class="col-2 col-lg-1">
                    Telefone
                </div>
                <div class="strong col-10 col-lg-11">
                    ({{ $user->phone_area_code }}) {{$user->phone_number}}
                </div>
            </div>

            <div class="row mb-1">
                <div class="col-2 col-lg-1">
                    Desde
                </div>
                <div class="strong col-10 col-lg-11">
                    {{ $user->created_at->format('d/m/Y') }}
                </div>
            </div>
        </div>
    </div>
@endsection
