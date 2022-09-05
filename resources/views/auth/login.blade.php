@extends('layouts.app', [
    'class' => 'border-top-wide border-primary d-flex flex-column'
])

@section('content')
    <div  class="container-tight py-4">
        <div class="text-center mb-4">
            <a href="#" class="navbar-brand navbar-brand-autodark">
                <img src="{{ mix('images/sonotas_logo_horizontal.png') }}" alt="{{ config('app.name', 'Só Notas') }}" height="50">
            </a>
        </div>

        @include('layouts.partials.messages')

        <form action="{{ route('login') }}" class="card shadow card-md" method="POST" autocomplete="off">
            @csrf
            <div class="card-body">
                <h2 class="fs-2 card-title text-center mb-4">Login</h2>
                <div class="mb-3">
                    <label for="email" class="  form-label ">E-mail</label>
                    <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                        name="email" placeholder="Digite seu e-mail" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="mb-2">
                    <label for="password" class="form-label">
                        Senha
                        <span class="form-label-description ">
                            <a href="{{ route('password.request') }}">Esqueci a senha</a>
                        </span>
                    </label>
                    <div class="input-group input-group-flat">
                        <input id="password" type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                            placeholder="Digite sua senha" autocomplete="off">
                        <!-- <span role="button" id="eye" class="input-group-text  ">
                            
                                <svg  xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="12" cy="12" r="2"></circle>
                                    <path
                                        d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7">
                                    </path>
                                </svg>
                            
                        </span> -->
                    </div>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="mb-2">
                    <label class="form-check">
                        <input type="checkbox" class="form-check-input" name="remember"
                            {{ old('remember') ? 'checked' : '' }}>
                        <span class="form-check-label">Lembre-me</span>
                    </label>
                </div>
                <div class="form-footer">
                    <button type="submit" class="btn btn-primary w-100">Entrar</button>
                </div>
            </div>
            
            <div class="text-center  fs-4 mt-2 mb-3">
                Ainda não tem conta? <a class="e fw-bold" href="{{ route('register') }}">Registre-se</a>
            </div>
        </form>
    </div>
@endsection

