@extends('layouts.app')

@section('page-pretitle', 'Cliente')
@section('page-title', (isset($cliente) ? 'Editar dados' : 'Cadastro'))

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>
                {{($cliente->nome ?? 'Novo cliente')}}
            </h2>
            <!-- <div class="card-actions">
                <a href="{{ route('clientes.list') }}" class="btn btn-sm btn-secondary">
                    Voltar
                </a>
            </div> -->
        </div>
        <div class="card-body">
            @if (isset($cliente))
                <form method="POST" action="{{ route('clientes.update', [$cliente]) }}">
                @method('PUT')
            @else
                <form method="POST" action="{{ route('clientes.store') }}">
            @endif

            @csrf

            <div class="row">
                <div class="mb-3 col-12">
                    <label class="form-label required">Empresa</label>
                        @if (isset($cliente))
                            <input type="hidden" name="empresa_id" value="{{$cliente->empresa->id}}">
                            <div class="form-control">
                                {{ $cliente->empresa->nome }}
                            </div>
                        @else
                            <select class="form-select" required name="empresa_id">
                                @foreach($empresas as $empresa)
                                    <option value="{{$empresa->id}}"
                                        {{ old('empresa_id', $cliente->empresa_id ?? '') == $empresa->id ? 'selected' : '' }}>
                                        {{$empresa->nome}}
                                    </option>
                                @endforeach
                            </select>
                        @endif
                    </div>
            </div>

                <div class="row">

                    <div class="mb-3 col-5 col-md-6">
                        <label for="name" class="form-label required">Nome</label>
                        <input type="text" class="form-control" name="nome"
                               required value="{{ old('nome', $cliente->nome ?? null) }}"
                        >
                        <div class="form-text">Nome ou Razão Social</div>
                    </div>

                    <div class="mb-3 col-4 col-md-4">
                        <label for="name" class="form-label">Fantasia</label>
                        <input type="text" class="form-control" name="alias"
                               value="{{ old('alias', $cliente->alias ?? null) }}"
                        >
                        <div class="form-text">Nome fantasia ou Apelido</div>
                    </div>

                    <div class="mb-3 col-3 col-md-2">
                        <div class="form-label">Órgão Público</div>
                        <label class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" value="1" name="orgao_publico"
                                {{ old('orgao_public', $cliente->orgao_public ?? false) ? 'checked' : null }}
                            >
                        </label>
                    </div>
                </div>


                <div class="row">

                    <div class="mb-3 col-12 col-md-8">
                        <label class="form-label required">E-mail</label>
                        <input type="email" class="form-control" name="email"
                               required value="{{ old('email', $cliente->email ?? null) }}"
                        >
                        <div class="form-text">Endereço de e-mail</div>
                    </div>

                    <div class="mb-3 col-2 col-md-1">
                        <label class="form-label required">DDD</label>
                        <input maxlength="2" type="number" class="form-control" name="telefone_ddd"
                               required value="{{ old('telefone_ddd', $cliente->telefone_ddd ?? null) }}"
                        >
                    </div>

                    <div class="mb-3 col-10 col-md-3">
                        <label class="form-label required">Número do telefone</label>
                        <input maxlength="10" type="number" class="form-control" name="telefone_num"
                               required value="{{ old('telefone_num', $cliente->telefone_num ?? null) }}"
                        >
                    </div>

                </div>

                <div class="row">

                    <div class="mb-3 col-12 col-md-4">
                        <label for="documento" class="form-label required">CNPJ / CPF</label>
                        <input type="number" class="form-control" name="documento"
                               required value="{{ old('documento', $cliente->documento ?? null) }}"
                        >
                        <div class="form-text">Documento (CNPJ ou CPF) de acordo com a natureza jurídica
                        </div>
                    </div>

                    <div class="mb-3 col-6 col-md-4">
                        <label for="name" class="form-label">Inscrição Estadual</label>
                        <input type="text" class="form-control" name="inscricao_estadual"
                               value="{{ old('inscricao_estadual', $cliente->inscricao_estadual ?? null) }}"
                        >
                    </div>

                    <div class="mb-3 col-6 col-md-4">
                        <label for="name" class="form-label">Inscrição Municipal</label>
                        <input type="text" class="form-control" name="inscricao_municipal"
                               value="{{ old('inscricao_municipal', $cliente->inscricao_municipal ?? null) }}"
                        >
                    </div>

                </div>

                    <div class="row">
                        <div class="mb-3 col-5 col-md-4">
                            <label class="form-label required">Regime Tributário</label>
                            <select class="form-select" required name="regime_tributario">
                                @foreach(\App\Services\Sped\SpedRegimesTributarios::toArray() as $regime)
                                    <option value="{{$regime['valor']}}"
                                        {{ old('regime_tributario', $cliente->regime_tributario ?? '') == $regime['valor'] ? 'selected' : '' }}>
                                        {{$regime['nome']}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3 col-7 col-md-4">
                            <label class="form-label required">Regime Tributário Especial</label>
                            <select class="form-select" required name="regime_tributario_especial">
                                @foreach(\App\Services\Sped\SpedRegimesTributariosEspeciais::toArray() as $regime)
                                    <option value="{{$regime['valor']}}"
                                        {{ old('regime_tributario_especial', $cliente->regime_tributario_especial ?? '') == $regime['valor'] ? 'selected' : '' }}>
                                        {{$regime['nome']}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                    @include('pages.partials.campos-endereco', ['model' => $cliente ?? null])

                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="{{ route('clientes.list') }}" class="btn btn-secondary">
                    Voltar
                </a>
            </form>
        </div>
    </div>
@endsection
