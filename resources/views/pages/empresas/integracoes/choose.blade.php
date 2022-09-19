@extends('layouts.app')

@section('page-pretitle', 'Integração')
@section('page-title', 'Escolha a plataforma'))

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>
                {{'Nova integração'}}
            </h2>
            <div class="card-actions">
                <a href="{{ route('empresas.list') }}" class="btn btn-sm btn-secondary">
                    Voltar
                </a>
            </div>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('empresas.integracoes.create', [$empresa]) }}">
                @csrf

                <div class="row">
                    <div class="mb-3 col-3">
                        <div class="form-label">Plataforma para configurar a integração</div>
                        <select class="form-select" name="platform">
                            @foreach($platforms as $plat)
                                <option value="{{ $plat }}">
                                    {{ $plat::$name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Continuar</button>
                <a href="{{ route('empresas.list') }}" class="btn btn-secondary">
                    Voltar
                </a>
            </form>
        </div>
    </div>
@endsection
