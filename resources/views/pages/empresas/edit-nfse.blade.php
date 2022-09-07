@extends('layouts.app')

@section('page-title', 'Configuração padrão NFSe da empresa')
@section('page-pretitle', (isset($empresa) ? 'Editar dados' : 'Cadastro'))

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
            @if (isset($nfseConfig))
                <form method="POST" action="{{ route('empresas.nfse.update', [$empresa, $nfseConfig]) }}">
                    @method('PUT')
            @else
                <form method="POST" action="{{ route('empresas.nfse.store', [$empresa]) }}">
            @endif

                @csrf

                <input type="hidden" name="empresa_id" value="{{$empresa->id}}">

                <div class="row">
                    <div class="mb-3 col-2">
                        <div class="form-label">Enviar NFSe email do cliente</div>
                        <label class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" value="1" name="enviar_nota_email_cliente"
                                {{ old('enviar_nota_email_cliente', $nfseConfig->enviar_nota_email_cliente ?? true) ? 'checked' : '' }}
                            >
                        </label>
                    </div>

                    <div class="mb-3 col-3 offset-4">
                        <label for="name" class="form-label">Usuário no portal da Prefeitura</label>
                        <input type="text" class="form-control" name="prefeitura_usuario"
                               value="{{ old('prefeitura_usuario', $nfseConfig->prefeitura_usuario ?? '') }}"
                        >
                    </div>

                    <div class="mb-3 col-3">
                        <label for="name" class="form-label">Senha no portal da Prefeitura</label>
                        <input type="password" class="form-control" name="prefeitura_senha"
                               value="{{ old('prefeitura_senha', $nfseConfig->prefeitura_senha ?? '') }}"
                        >
                    </div>
                </div>

                <div class="row">

                    <div class="mb-3 col-12">
                        <label class="form-label required">CNAE</label>
                        <select class="form-select" required name="cnae_codigo" id="cnae_codigo">
                            <option value="">Selectione</option>
                            @foreach(\App\Models\Cnae::orderBy('codigo')->get() as $cnae)
                                <option value="{{$cnae->codigo}}"
                                    {{ old('cnae_codigo', $nfseConfig->cnae_codigo ?? '') == $cnae->codigo ? 'selected' : '' }}>
                                    {{$cnae->codigo}} - {{$cnae->descricao}}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3 col-12">
                        <label class="form-label required">Tipo Serviço (LC 116)</label>
                        <select class="form-select" required name="tipo_servico_codigo" id="tipo_servico_codigo">
                            <option value="">Selectione</option>
                            @foreach(\App\Models\TipoServico::orderBy('codigo')->get() as $tipo)
                                <option value="{{$tipo->codigo}}"
                                    {{ old('tipo_servico_codigo', $nfseConfig->tipo_servico_codigo ?? '') == $tipo->codigo ? 'selected' : '' }}>
                                    {{$tipo->codigo}} - {{$tipo->descricao}}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3 col-2">
                        <label for="name" class="form-label required">Cód.Serviço no Município</label>
                        <input type="text" class="form-control" name="municipio_servico_codigo"
                               required value="{{ old('municipio_servico_codigo', $nfseConfig->municipio_servico_codigo ?? '') }}"
                        >
                    </div>

                    <div class="mb-3 col-4">
                        <label for="name" class="form-label required">Descrição do Serviço no Município</label>
                        <input type="text" class="form-control" name="municipio_servico_descricao"
                               required value="{{ old('municipio_servico_descricao', $nfseConfig->municipio_servico_descricao ?? '') }}"
                        >
                    </div>

                    <div class="mb-3 col-2">
                        <label for="name" class="form-label required">Nat.Operação</label>
                        <input type="text" class="form-control" name="natureza_operacao"
                               required value="{{ old('natureza_operacao', $nfseConfig->natureza_operacao ?? '') }}"
                        >
                    </div>

                    <div class="mb-3 col-2">
                        <label class="form-label required">Tributos</label>
                        <input type="number" step="0.01" class="form-control" name="tributos"
                               required value="{{ old('tributos', $nfseConfig->tributos ?? '') }}"
                        >
                    </div>

                    <div class="mb-3 col-2">
                        <label for="name" class="form-label">Último RPS</label>
                        <input type="text" class="form-control" name="ultimo_rps_liberado"
                               value="{{ old('ultimo_rps_liberado', $nfseConfig->ultimo_rps_liberado ?? '') }}"
                        >
                    </div>


                </div>

                <div class="row">

                    <div class="mb-3 col-1">
                        <label class="form-label required">Cofins</label>
                        <input type="number" step="0.01" class="form-control" name="cofins"
                               required value="{{ old('cofins', $nfseConfig->cofins ?? '') }}"
                        >
                    </div>

                    <div class="mb-3 col-1">
                        <label class="form-label required">CSLL</label>
                        <input type="number" step="0.01" class="form-control" name="csll"
                               required value="{{ old('csll', $nfseConfig->csll ?? '') }}"
                        >
                    </div>

                    <div class="mb-3 col-1">
                        <label class="form-label required">INSS</label>
                        <input type="number" step="0.01" class="form-control" name="inss"
                               required value="{{ old('inss', $nfseConfig->inss ?? '') }}"
                        >
                    </div>

                    <div class="mb-3 col-1">
                        <label class="form-label required">IR</label>
                        <input type="number" step="0.01" class="form-control" name="ir"
                               required value="{{ old('ir', $nfseConfig->ir ?? '') }}"
                        >
                    </div>

                    <div class="mb-3 col-1">
                        <label class="form-label required">PIS</label>
                        <input type="number" step="0.01" class="form-control" name="pis"
                               required value="{{ old('pis', $nfseConfig->pis ?? '') }}"
                        >
                    </div>

                    <div class="mb-3 col-1">
                        <label class="form-label required">ISS</label>
                        <input type="number" step="0.01" class="form-control" name="iss"
                               required value="{{ old('iss', $nfseConfig->iss ?? '') }}"
                        >
                    </div>

                    <div class="mb-3 col-2">
                        <div class="form-label">ISS Retido Fonte</div>
                        <label class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" value="1" name="iss_retido_fonte"
                                {{ old('iss_retido_fonte', $empresa->iss_retido_fonte ?? '') ? 'checked' : '' }}
                            >
                        </label>
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

@push('js')
<script type="text/javascript">    
    $(function() {
        $('#tipo_servico_codigo, #cnae_codigo').select2({
            language: "pt-BR",
            placeholder: 'Infome uma descrição',
            // width: '350px',
            allowClear: true,
        });
    });
    
    $(document).on('select2:open', () => {
        document.querySelector('.select2-search__field').focus();
    });
</script>
@endpush