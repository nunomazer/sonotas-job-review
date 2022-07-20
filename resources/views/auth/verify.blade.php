@extends('layouts.app')

@section('content')
    <div class="container-tight py-4">
        <div class="text-center mb-4">
            <a href="#" class="navbar-brand navbar-brand-autodark">
                <img src="{{ mix('images/sonotas_logo.png') }}" alt="{{ config('app.name', 'Só Notas') }}" height="50">
            </a>
        </div>
        <form class="card card-md" action="{{ route('verification.resend') }}" method="POST" autocomplete="off">
            @csrf
            <div class="card-body">
                <h2 class="card-title text-center mb-4">Verifique seu endereço de e-mail</h2>
                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        Um novo link de verificação foi enviado para seu endereço de e-mail.
                    </div>
                @endif
                <p class="text-muted mb-4">Antes de continuar, verifique seu e-mail para obter um link de verificação.</p>
                <p class="text-muted mb-4">Se você não recebeu o e-mail</p>
            </div>
            <div class="form-footer">
                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">Clique aqui para solicitar
                    outro.</button>
            </div>
        </form>
    </div>
@endsection
