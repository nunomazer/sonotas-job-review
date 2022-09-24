@extends('layouts.app', [
    'class' => 'border-top-wide border-primary d-flex flex-column'
])

@section('content')
    <div class="container-tight py-4">
        <div class="text-center mb-4">
            <a href="#" class="navbar-brand navbar-brand-autodark">
                <img src="{{ mix('images/sonotas_logo_horizontal.png') }}" alt="{{ config('app.name', 'Só Notas') }}" height="50">
            </a>
        </div>

        @include('layouts.partials.messages')

        <form class="card card-md" action="{{ route('register') }}" method="POST" autocomplete="off">
            @csrf
            <div class="card-body">
                <h2 class="card-title text-center mb-4">Criar nova conta</h2>
                <div class="mb-3">
                    <label class="form-label required">Nome</label>
                    <input type="text" name="name"
                        class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Insira seu nome"
                        value="{{ old('name') }}" required autofocus>
                    @if ($errors->has('name'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="mb-3">
                    <label class="form-label required">E-mail</label>
                    <input type="email" name="email"
                        class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                        placeholder="Insira seu e-mail" value="{{ old('email') }}" required />
                    @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="mb-3">
                    <label class="form-label  required">CPF</label>
                    <input type="text" name="cpf"
                        class="form-control cpf {{ $errors->has('cpf') ? ' is-invalid' : '' }}"
                        placeholder="Insira seu cpf" value="{{ old('cpf') }}" required />
                    @if ($errors->has('cpf'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('cpf') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="mb-3">
                    <label class="form-label required">Telefone (DDD + Número)</label>
                    <input type="tel" name="telefone"
                        class="form-control phone_with_ddd {{ $errors->has('telefone') ? ' is-invalid' : '' }}"
                        placeholder="Insira seu telefone" value="{{ old('telefone') }}" required />
                    @if ($errors->has('telefone'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('telefone') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="mb-3">
                    <label class="form-label required">Senha</label>
                    <div class="input-group input-group-flat">
                        <input type="password" name="password" class="form-control" placeholder="Insira sua senha"
                            autocomplete="off" required>
                        <!-- <span class="input-group-text">
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
                        </span> -->
                    </div>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="mb-3">
                    <label class="form-label required">Confirme a Senha</label>
                    <div class="input-group input-group-flat">
                        <input type="password" name="password_confirmation" class="form-control"
                            placeholder="Confirme a Senha" autocomplete="off" required>
                        <!-- <span class="input-group-text">
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
                        </span> -->
                    </div>
                    @if ($errors->has('password_confirmation'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="mb-3">
                    <label class="form-check">
                        <input type="checkbox" name="termos" class="form-check-input {{ $errors->has('termos') ? ' is-invalid' : '' }}">
                        <span class="form-check-label required ">Concordo com os <a target="_blank" href="{{asset('termos.pdf')}}" tabindex="-1">termos e política</a>.</span>
                    </label>
                    @if ($errors->has('termos'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('termos') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-footer">
                    <button type="submit" class="btn btn-primary w-100">Criar nova conta</button>
                </div>
            </div>
        </form>
        <div class="text-center text-muted mt-3">
            Já tem conta? <a href="{{ route('login') }}">Entrar</a>
        </div>
    </div>
@endsection
@push('js')
    <script type="text/javascript">
        $(document).ready(function(){
            $('.phone_with_ddd').mask('(00) 0000-00009');
            $('.cpf').mask('000.000.000-00', {reverse: true});
        });
        
    </script>
@endpush
