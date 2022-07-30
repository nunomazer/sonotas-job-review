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
                <form method="POST" action="{{ route('empresas.integracoes.store', [$empresa]) }}">
            @endif

                @csrf

                <div class="row">

                    <div class="mb-3 col-6">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" class="form-control" name="nome"
                               required value="{{ old('nome', $empresa->nome ?? '') }}"
                        >
                        <div class="form-text">Razão Social / Nome da Empresa</div>
                    </div>

                    <div class="mb-3 col-4">
                        <label for="name" class="form-label">Fantasia</label>
                        <input type="text" class="form-control" name="alias"
                               required value="{{ old('alias', $empresa->alias) }}"
                        >
                        <div class="form-text">Nome fantasia / apelido</div>
                    </div>

                    <div class="mb-3 col-2">
                        <div class="form-label">Ativo</div>
                        <label class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" value="1" name="ativo"
                                {{ old('ativo', $empresa->ativo) ? 'checked' : '' }}
                            >
                        </label>
                    </div>

                </div>


                <div class="row">

                    <div class="mb-3 col-8">
                        <label class="form-label">E-mail</label>
                        <input type="text" class="form-control" name="email"
                               required value="{{ old('email', $empresa->email) }}"
                        >
                        <div class="form-text">Endereço de e-mail que receberá as notificações da plataforma</div>
                    </div>

                    <div class="mb-3 col-1">
                        <label class="form-label">DDD</label>
                        <input type="number" class="form-control" name="telefone_ddd"
                               value="{{ old('telefone_dds', $empresa->telefone_ddd) }}"
                        >
                    </div>

                    <div class="mb-3 col-3">
                        <label class="form-label">Número do telefone</label>
                        <input type="number" class="form-control" name="telefone_num"
                               value="{{ old('telefone_num', $empresa->telefone_num) }}"
                        >
                    </div>

                </div>

                <div class="row">

                    <div class="mb-3 col-4">
                        <label for="documento" class="form-label">CNPJ / CPF</label>
                        <input type="text" class="form-control" name="documento"
                               required value="{{ old('documento', $empresa->documento) }}"
                        >
                        <div class="form-text">Documento (CNPJ ou CPF) de acordo com a natureza jurídica</div>
                    </div>

                    <div class="mb-3 col-4">
                        <label for="name" class="form-label">Inscrição Estadual</label>
                        <input type="text" class="form-control" name="inscricao_estadual"
                               value="{{ old('inscricao_estadual', $empresa->inscricao_estadual) }}"
                        >
                    </div>

                    <div class="mb-3 col-4">
                        <label for="name" class="form-label">Inscrição Municipal</label>
                        <input type="text" class="form-control" name="inscricao_municipal"
                               value="{{ old('inscricao_municipal', $empresa->inscricao_municipal) }}"
                        >
                    </div>

                </div>

                @include('pages.partials.campos-endereco', ['model' => $empresa])

                @include('pages.empresas.partials.config-nfse', ['model' => $empresa])

                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="{{ route('empresas.list') }}" class="btn btn-secondary">
                    Voltar
                </a>
            </form>
        </div>
    </div>
@endsection
