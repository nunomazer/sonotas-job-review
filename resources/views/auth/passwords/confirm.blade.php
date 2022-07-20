@extends('layouts.app')

@section('content')
    <div class="container-tight py-4">
        <div class="text-center mb-4">
            <a href="#" class="navbar-brand navbar-brand-autodark">
                <img src="{{ mix('images/sonotas_logo.png') }}" alt="{{ config('app.name', 'Só Notas') }}" height="50">
            </a>
        </div>
    </div>
    <form class="card card-md" action="{{ route('password.confirm') }}" method="POST" autocomplete="off">
        @csrf
        <div class="card-body">
            <h2 class="card-title text-center mb-4">Confirme a Senha</h2>
            <p class="text-muted mb-4">Confirme sua senha antes de continuar.
            </p>
            <div class="mb-3">
                <label class="form-label">Senha</label>
                <div class="input-group input-group-flat">
                    <input type="password" name="password" class="form-control" placeholder="Insira sua senha"
                        autocomplete="off" required>
                    <span class="input-group-text">
                        <a href="#" class="link-secondary" data-bs-toggle="tooltip">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <circle cx="12" cy="12" r="2"></circle>
                                <path
                                    d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7">
                                </path>
                            </svg>
                        </a>
                    </span>
                </div>
                @if ($errors->has('password'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label">Confirme a Senha</label>
                <div class="input-group input-group-flat">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirme a Senha"
                        autocomplete="off" required>
                    <span class="input-group-text">
                        <a href="#" class="link-secondary" data-bs-toggle="tooltip">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <circle cx="12" cy="12" r="2"></circle>
                                <path
                                    d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7">
                                </path>
                            </svg>
                        </a>
                    </span>
                </div>
                @if ($errors->has('password_confirmation'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-footer">
            <button type="submit" class="btn btn-primary w-100">Confirme a Senha</button>
        </div>
    </form>
    <div class="text-center text-muted mt-3">
        @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">Esqueceu sua senha?</a>
        @endif
    </div>
@endsection
