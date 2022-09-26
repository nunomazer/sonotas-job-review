@extends('layouts.app')

@section('page-title', 'Serviço')
@section('page-pretitle', (isset($empresa) ? 'Editar dados' : 'Cadastro'))

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>
                {{(isset($servico) ? $servico->nome : 'Novo serviço')}}
            </h2>
            <div class="card-actions">
                <a href="{{ route('servicos.list') }}" class="btn btn-sm btn-secondary">
                    Voltar
                </a>
            </div>
        </div>
        <div class="card-body">
            @if (isset($servico))
                <form method="POST" action="{{ route('servicos.update', [$servico]) }}">
                    @method('PUT')
            @else
                <form method="POST" action="{{ route('servicos.store') }}">
            @endif

                @csrf

                <div class="row">
                    <div class="mb-3 col-12 col-md-12">
                        <label class="form-label required">Empresa</label>
                        @if (isset($servico))
                            <input type="hidden" name="empresa_id" value="{{$servico->empresa->id}}">
                            <div class="form-control">
                                {{ $servico->empresa->nome }}
                            </div>
                        @else
                            <select class="form-select" required name="empresa_id" id="empresa_id">
                                @foreach($empresas as $empresa)
                                    <option value="{{$empresa->id}}"
                                        {{ old('empresa_id', $servico->empresa_id ?? '') == $empresa->id ? 'selected' : '' }}>
                                        {{$empresa->nome}}
                                    </option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-7  col-md-3">
                        <div class="form-label">Enviar NFSe email do cliente</div>
                        <label class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" value="1" name="enviar_nota_email_cliente"
                                {{ old('enviar_nota_email_cliente', $servico->enviar_nota_email_cliente ?? true) ? 'checked' : '' }}
                            >
                        </label>
                    </div>

                    <div class="mb-3 col-5 col-md-2">
                        <div class="form-label">Ativo</div>
                        <label class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" value="1" name="ativo"
                                {{ old('ativo', $servico->ativo ?? false) ? 'checked' : '' }}
                            >
                        </label>
                    </div>

                </div>

                <div class="row">

                    <div class="mb-3 col-8 col-md-10">
                        <label for="name" class="form-label required">Nome</label>
                        <input type="text" class="form-control" name="nome"
                               required value="{{ old('nome', $servico->nome ?? '') }}"
                        >
                        <div class="form-text">Nome ou identificação resumida do serviço</div>
                    </div>

                    <div class="mb-3 col-4 col-md-2">
                        <label for="name" class="form-label required">Valor</label>
                        <input type="number" step="0.01" class="form-control" name="valor"
                               required value="{{ old('valor', $servico->valor ?? '') }}"
                        >
                    </div>


                    <div class="mb-3 col-12">
                        <label for="name" class="form-label required">Descrição</label>
                        <input type="text" class="form-control" name="descricao"
                               required value="{{ old('nome', $servico->descricao ?? '') }}"
                        >
                        <div class="form-text">Descrição do serviço</div>
                    </div>

                    <div class="mb-3 col-12">
                        <label class="form-label required">Tipo Serviço (LC 116)</label>
                        <select class="form-select" required name="tipo_servico_codigo" id="tipo_servico_codigo">
                            <option value="">Selectione</option>
                            @foreach(\App\Models\TipoServico::orderBy('codigo')->get() as $tipo)
                                <option value="{{$tipo->codigo}}"
                                    {{ old('tipo_servico_codigo', $servico->tipo_servico_codigo ?? '') == $tipo->codigo ? 'selected' : '' }}>
                                    {{$tipo->codigo}} - {{$tipo->descricao}}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3 col-6 col-md-3">
                        <label for="name" class="form-label required">Cód.Serviço no Município</label>
                        <input type="text" class="form-control" name="municipio_servico_codigo" id="municipio_servico_codigo"
                               required value="{{ old('municipio_servico_codigo', $servico->municipio_servico_codigo ?? null) }}"
                        >
                    </div>

                    <div class="mb-3 col-6 col-md-4">
                        <label for="name" class="form-label required">Descrição do Serviço no Município</label>
                        <input type="text" class="form-control" name="municipio_servico_descricao" id="municipio_servico_descricao"
                               required value="{{ old('municipio_servico_descricao', $servico->municipio_servico_descricao ?? null) }}"
                        >
                    </div>

                </div>

                <div class="row">

                    <div class="mb-3 col-3 col-md-1">
                        <label class="form-label required">Cofins</label>
                        <input type="number" step="0.01" class="form-control" name="cofins" id="cofins"
                               required value="{{ old('cofins', $servico->cofins ?? '') }}"
                        >
                    </div>

                    <div class="mb-3 col-3 col-md-1">
                        <label class="form-label required">CSLL</label>
                        <input type="number" step="0.01" class="form-control" name="csll" id="csll"
                               required value="{{ old('csll', $servico->csll ?? '') }}"
                        >
                    </div>

                    <div class="mb-3 col-3 col-md-1">
                        <label class="form-label required">INSS</label>
                        <input type="number" step="0.01" class="form-control" name="inss" id="inss"
                               required value="{{ old('inss', $servico->inss ?? '') }}"
                        >
                    </div>

                    <div class="mb-3 col-3 col-md-1">
                        <label class="form-label required">IR</label>
                        <input type="number" step="0.01" class="form-control" name="ir" id="ir"
                               required value="{{ old('ir', $servico->ir ?? '') }}"
                        >
                    </div>

                    <div class="mb-3 col-3 col-md-1">
                        <label class="form-label required">PIS</label>
                        <input type="number" step="0.01" class="form-control" name="pis" id="pis"
                               required value="{{ old('pis', $servico->pis ?? '') }}"
                        >
                    </div>

                    <div class="mb-3 col-3 col-md-1">
                        <label class="form-label required">ISS</label>
                        <input type="number" step="0.01" class="form-control" name="iss" id="iss"
                               required value="{{ old('iss', $servico->iss ?? '') }}"
                        >
                    </div>

                    <div class="mb-3 col-3 col-md-2">
                        <div class="form-label">ISS Retido Fonte</div>
                        <label class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" value="1" name="iss_retido_fonte" id="iss_retido_fonte"
                                {{ old('iss_retido_fonte', $servico->iss_retido_fonte ?? '') ? 'checked' : '' }}
                            >
                        </label>
                    </div>

                </div>

                <div class="row">
                    <div class="mb-3 col-12">
                        <label for="name" class="form-label">Observações</label>
                        <textarea class="form-control" name="obs">{{ old('nome', $servico->obs ?? '') }}</textarea>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="{{ route('servicos.list') }}" class="btn btn-secondary">
                    Voltar
                </a>
            </form>
        </div>
    </div>
@endsection

@push('js')
<script type="text/javascript">
    $(function() {
        const creating = {{isset($servico) ? 'false' : 'true'}};

        $('#tipo_servico_codigo').select2({
            theme: 'bootstrap4',
            language: "pt-BR",
            placeholder: 'Infome uma descrição',
            // width: '350px',
            allowClear: true,
        });

        function loadConfiguracaoNFSe() {
            const id = $('#empresa_id').val();
            const baseRoute = "{{route('api.empresas.configuracao-nfse.get', 999999)}}";
            $.get(baseRoute.replace('999999', id), function(data) {
                console.log(data);
                $('#tipo_servico_codigo').val(data.tipo_servico_codigo);
                $('#tipo_servico_codigo').trigger('change');
                $('#municipio_servico_codigo').val(data.municipio_servico_codigo);
                $('#municipio_servico_descricao').val(data.municipio_servico_descricao);
                $('#cofins').val(data.cofins);
                $('#csll').val(data.csll);
                $('#inss').val(data.inss);
                $('#ir').val(data.ir);
                $('#pis').val(data.pis);
                $('#iss').val(data.iss);
                $('#iss_retido_fonte').attr("checked",data.iss_retido_fonte);
            });
        }

        $('#empresa_id').on('change', loadConfiguracaoNFSe);

        if (creating) {
            loadConfiguracaoNFSe();
        }
    });

    $(document).on('select2:open', () => {
        document.querySelector('.select2-search__field').focus();
    });
</script>
@endpush
