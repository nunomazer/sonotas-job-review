@extends('layouts.app')

@section('page-title', 'Assinatura de Plano')
@section('page-pretitle', (isset($empresa) ? 'Editar dados' : 'Assinar'))

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>
                {{$empresa->nome}}
            </h2>
            <div class="card-actions">
                <a href="{{ route('empresas.list') }}" class="btn btn-sm btn-secondary">
                    Voltar
                </a>
            </div>
        </div>
        <div class="card-body">
            @if (isset($nfseConfig))
            <form method="POST" action="{{ route('empresas.nfse.update', [$empresa, $assinatura]) }}">
                @method('PUT')
            @else
                <form method="POST" action="{{ route('empresas.assinatura.store', [$empresa]) }}">
            @endif

            @csrf

            <input type="hidden" name="empresa_id" value="{{$empresa->id}}">

            <div class="row">
                <div class="mb-3 col-12">
                    <label class="form-label required">Plano</label>
                    <select class="form-select" required name="plan_id">
                        <option value="">Escolha o plano para assinar</option>
                        @foreach($plans as $plan)
                            <option value="{{$plan->id}}"
                                {{ old('plan_id', $assinatura->plan_id ?? '') == $plan->id ? 'selected' : '' }}>
                                {{$plan->name}} - {{number_format($plan->price, 2, ',', '.') }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3 col-3">
                    <label class="form-label required">Nome como impresso no cartão de crédito</label>
                    <input type="text" class="form-control" name="nome"
                           required value="{{ old('nome') }}"
                    >
                </div>

                <div class="mb-3 col-3">
                    <label class="form-label required">Número do Cartão de Crédito</label>
                    <input type="text" class="form-control" name="cartao_credito"
                           required value="{{ old('cartao_credito') }}"
                    >
                </div>

                <div class="mb-3 col-3">
                    <label class="form-label required">Data de Validade (MM/AAAA)</label>
                    <input type="text" class="form-control" name="validade"
                           required value="{{ old('validade') }}"
                    >
                </div>

                <div class="mb-3 col-3">
                    <label class="form-label required">Código de verificação</label>
                    <input type="text" class="form-control" name="codigo"
                           required value="{{ old('codigo') }}"
                    >
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="{{ route('empresas.list') }}" class="btn btn-secondary">
                Voltar
            </a>
        </form>
        </div>
    </div>
@endsection
