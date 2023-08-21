@extends('layouts.app')

@section('page-pretitle', 'Afiliado')
@section('page-title', (isset($afiliado) ? 'Editar dados' : 'Cadastro'))

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>
                {{(isset($afiliado) ? $afiliado->nome : 'Novo afiliado')}}
            </h2>
            <div class="card-actions">
                <a href="{{ route('afiliados.list') }}" class="btn btn-sm btn-secondary">
                    Voltar
                </a>
            </div>
        </div>
        <div class="card-body">
            @if (isset($afiliado))
                <form method="POST" action="{{ route('afiliados.update', [$afiliado]) }}" enctype="multipart/form-data">
                    @method('PUT')
            @else
                <form method="POST" action="{{ route('afiliados.store') }}" enctype="multipart/form-data">
            @endif

            @csrf

            <input type="hidden" name="user_id" value="{{$afiliado->user_id ?? null}}">

            <div class="row">
                <div class="mb-3 col-6">
                    <label for="name" class="form-label required">Nome</label>
                    <input type="text" class="form-control" name="nome"
                           required value="{{ old('nome', $afiliado->nome ?? '') }}"
                    >
                    <div class="form-text">Razão Social / Nome do Afiliado</div>
                </div>

                <div class="mb-3 col-4">
                    <label for="name" class="form-label">Fantasia</label>
                    <input type="text" class="form-control" name="alias"
                           value="{{ old('alias', $afiliado->alias ?? null) }}"
                    >
                    <div class="form-text">Nome fantasia / apelido</div>
                </div>

                <div class="mb-3 col-2">
                    <div class="form-label">Ativo</div>
                    <label class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" value="1" name="ativo"
                            {{ old('ativo', $afiliado->ativo ?? false ) ? 'checked' : '' }}
                        >
                    </label>
                </div>

            </div>


            <div class="row">

                <div class="mb-3 col-12 col-md-8">
                    <label class="form-label required">E-mail</label>
                    <input type="email" class="form-control" name="email"
                           required value="{{ old('email', $afiliado->email ?? null) }}"
                    >
                    <div class="form-text">Endereço de e-mail que receberá as notificações da
                        plataforma
                    </div>
                </div>

                <div class="mb-3 col-2 col-md-1">
                    <label class="form-label required">DDD</label>
                    <input type="number" maxlength="2" class="form-control" name="telefone_ddd"
                           required value="{{ old('telefone_ddd', $afiliado->telefone_ddd ?? null) }}"
                    >
                </div>

                <div class="mb-3 col-10 col-md-3">
                    <label class="form-label required">Telefone</label>
                    <input type="number" maxlength="10" class="form-control" name="telefone_num"
                           required value="{{ old('telefone_num', $afiliado->telefone_num ?? null) }}"
                    >
                </div>

            </div>

            <div class="row">

                <div class="mb-3 col-12 col-md-4">
                    <label for="documento" class="form-label required">CNPJ / CPF</label>
                    <input type="text" class="form-control" name="documento"
                           required value="{{ old('documento', $afiliado->documento ?? null) }}"
                    >
                    <div class="form-text">Documento (CNPJ ou CPF) de acordo com a natureza jurídica
                    </div>
                </div>

                <div class="mb-3 col-6 col-md-4">
                    <label for="name" class="form-label">Inscrição Estadual</label>
                    <input type="text" class="form-control" name="inscricao_estadual"
                           value="{{ old('inscricao_estadual', $afiliado->inscricao_estadual ?? null) }}"
                    >
                </div>

                <div class="mb-3 col-6 col-md-4">
                    <label for="name" class="form-label">Inscrição Municipal</label>
                    <input type="text" class="form-control" name="inscricao_municipal"
                           value="{{ old('inscricao_municipal', $afiliado->inscricao_municipal ?? null) }}"
                    >
                </div>

            </div>
            <br />

            @include('pages.partials.campos-endereco', ['model' => $afiliado ?? null])

            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="{{ route('empresas.list') }}" class="btn btn-secondary">
                Voltar
            </a>
        </form>
        </div>
    </div>
@endsection
