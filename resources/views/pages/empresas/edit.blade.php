@extends('layouts.app')

@section('page-pretitle', 'Empresa')
@section('page-title', (isset($empresa) ? 'Editar dados' : 'Cadastro'))

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>
                {{(isset($empresa) ? $empresa->nome : 'Nova empresa')}}
            </h2>
            <div class="card-actions">
                <a href="{{ route('empresas.list') }}" class="btn btn-sm btn-secondary">
                    Voltar
                </a>
            </div>
        </div>
        <div class="card-body">
            @if (isset($empresa))
                <form method="POST" action="{{ route('empresas.update', [$empresa]) }}">
                    @method('PUT')
            @else
                <form method="POST" action="{{ route('empresas.store') }}">
            @endif

            @csrf

            <input type="hidden" name="owner_user_id" value="{{$empresa->owner_user_id ?? auth()->user()->id}}">

            <div class="row">
                <div class="mb-3 col-6">
                    <label for="name" class="form-label required">Nome</label>
                    <input type="text" class="form-control" name="nome"
                           required value="{{ old('nome', $empresa->nome ?? '') }}"
                    >
                    <div class="form-text">Razão Social / Nome da Empresa</div>
                </div>

                <div class="mb-3 col-4">
                    <label for="name" class="form-label">Fantasia</label>
                    <input type="text" class="form-control" name="alias"
                           value="{{ old('alias', $empresa->alias ?? null) }}"
                    >
                    <div class="form-text">Nome fantasia / apelido</div>
                </div>

                <div class="mb-3 col-2">
                    <div class="form-label">Ativo</div>
                    <label class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" value="1" name="ativo"
                            {{ old('ativo', $empresa->ativo ?? false) ? 'checked' : '' }}
                        >
                    </label>
                </div>

            </div>


            <div class="row">

                <div class="mb-3 col-8">
                    <label class="form-label required">E-mail</label>
                    <input type="text" class="form-control" name="email"
                           required value="{{ old('email', $empresa->email ?? null) }}"
                    >
                    <div class="form-text">Endereço de e-mail que receberá as notificações da
                        plataforma
                    </div>
                </div>

                <div class="mb-3 col-1">
                    <label class="form-label required">DDD</label>
                    <input type="number" class="form-control" name="telefone_ddd"
                           required value="{{ old('telefone_ddd', $empresa->telefone_ddd ?? null) }}"
                    >
                </div>

                <div class="mb-3 col-3">
                    <label class="form-label required">Número do telefone</label>
                    <input type="number" class="form-control" name="telefone_num"
                           required value="{{ old('telefone_num', $empresa->telefone_num ?? null) }}"
                    >
                </div>

            </div>

            <div class="row">

                <div class="mb-3 col-4">
                    <label for="documento" class="form-label required">CNPJ / CPF</label>
                    <input type="text" class="form-control" name="documento"
                           required value="{{ old('documento', $empresa->documento ?? null) }}"
                    >
                    <div class="form-text">Documento (CNPJ ou CPF) de acordo com a natureza jurídica
                    </div>
                </div>

                <div class="mb-3 col-4">
                    <label for="name" class="form-label">Inscrição Estadual</label>
                    <input type="text" class="form-control" name="inscricao_estadual"
                           value="{{ old('inscricao_estadual', $empresa->inscricao_estadual ?? null) }}"
                    >
                </div>

                <div class="mb-3 col-4">
                    <label for="name" class="form-label">Inscrição Municipal</label>
                    <input type="text" class="form-control" name="inscricao_municipal"
                           value="{{ old('inscricao_municipal', $empresa->inscricao_municipal ?? null) }}"
                    >
                </div>

            </div>

            <div class="row">

                <div class="mb-3 col-4">
                    <label class="form-label required">Regime Tributário</label>
                    <select class="form-select" required name="regime_tributario">
                        @foreach(\App\Services\Sped\SpedRegimesTributarios::toArray() as $regime)
                            <option value="{{$regime['valor']}}"
                                {{ old('regime_tributario', $model->regime_tributario ?? '') == $regime['valor'] ? 'selected' : '' }}>
                                {{$regime['nome']}}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3 col-4">
                    <label class="form-label required">Regime Tributário Especial</label>
                    <select class="form-select" required name="regime_tributario_especial">
                        @foreach(\App\Services\Sped\SpedRegimesTributariosEspeciais::toArray() as $regime)
                            <option value="{{$regime['valor']}}"
                                {{ old('regime_tributario_especial', $model->regime_tributario_especial ?? '') == $regime['valor'] ? 'selected' : '' }}>
                                {{$regime['nome']}}
                            </option>
                        @endforeach
                    </select>
                </div>

            </div>

            @include('pages.partials.campos-endereco', ['model' => $empresa ?? null])

            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="{{ route('empresas.list') }}" class="btn btn-secondary">
                Voltar
            </a>
        </form>
        </div>
    </div>
@endsection
