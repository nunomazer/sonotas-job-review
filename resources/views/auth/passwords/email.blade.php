@extends('layouts.app')

@section('content')
    <div class="container-tight py-4">
        <div class="text-center mb-4">
            <a href="#" class="navbar-brand navbar-brand-autodark">
                <img src="{{ mix('images/sonotas_logo.png') }}" alt="{{ config('app.name', 'Só Notas') }}" height="50">
            </a>
        </div>
        <form class="card card-md" action="{{ route('password.email') }}" method="POST" autocomplete="off">
            @csrf
            <div class="card-body">
                <h2 class="card-title text-center mb-4">Esqueceu a senha</h2>
                <p class="text-muted mb-4">Digite seu endereço de e-mail e sua senha será redefinida e enviada para você.
                </p>
                <div class="mb-3">
                    <label class="form-label">E-mail</label>
                    <input type="email" class="form-control" placeholder="Insira seu e-mail" value="{{ old('email') }}"
                        required autofocus>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-footer">
                    <button type="submit" class="btn btn-primary w-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <rect x="3" y="5" width="18" height="14" rx="2"></rect>
                            <polyline points="3 7 12 13 21 7"></polyline>
                        </svg>
                        Envie-me uma nova senha
                        </a>
                </div>
            </div>
        </form>
        <div class="text-center text-muted mt-3">
            Esqueça, <a href="{{ route('login') }}">me mande de volta</a> para a tela de login.
        </div>
    </div>
@endsection
