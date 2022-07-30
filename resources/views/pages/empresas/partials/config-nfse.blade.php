<h3 class="strong border-top border-bottom p-1">Configurações padrão Notas Fiscais de Serviço - NFSe</h3>

<div class="row">
    <div class="mb-3 col-2">
        <div class="form-label">Enviar NFSe email do cliente</div>
        <label class="form-check form-switch">
            <input class="form-check-input" type="checkbox" value="1" name="enviar_nota_email_cliente"
                {{ old('enviar_nota_email_cliente', $empresa->enviar_nota_email_cliente) ? 'checked' : '' }}
            >
        </label>
    </div>

    <div class="mb-3 col-3 offset-4">
        <label for="name" class="form-label">Usuário no portal da Prefeitura</label>
        <input type="text" class="form-control" name="prefeitura_usuario"
               value="{{ old('prefeitura_usuario', $empresa->prefeitura_usuario) }}"
        >
    </div>

    <div class="mb-3 col-3">
        <label for="name" class="form-label">Senha no portal da Prefeitura</label>
        <input type="password" class="form-control" name="prefeitura_senha"
               value="{{ old('prefeitura_senha', $empresa->prefeitura_senha) }}"
        >
    </div>
</div>

<div class="row">

    <div class="mb-3 col-12">
        <label class="form-label required">CNAE</label>
        <select class="form-select" required name="cnae_codigo">
            <option value="">Selectione</option>
            @foreach(\App\Models\Cnae::orderBy('codigo')->get() as $cnae)
                <option value="{{$cnae->codigo}}"
                    {{ old('cnae_codigo', $model->cnae_codigo ?? '') == $cnae->codigo ? 'selected' : '' }}>
                        {{$cnae->codigo}} - {{$cnae->descricao}}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3 col-12">
        <label class="form-label required">Tipo Serviço (LC 116)</label>
        <select class="form-select" required name="tipo_servico">
            <option value="">Selectione</option>
            @foreach(\App\Models\TipoServico::orderBy('codigo')->get() as $tipo)
                <option value="{{$tipo->codigo}}"
                    {{ old('tipo_servico_codigo', $model->tipo_servico_codigo ?? '') == $tipo->codigo ? 'selected' : '' }}>
                        {{$tipo->codigo}} - {{$tipo->descricao}}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3 col-2">
        <label for="name" class="form-label required">Cód.Serviço no Município</label>
        <input type="text" class="form-control" name="municipio_servico_codigo"
               required value="{{ old('municipio_servico_codigo', $empresa->municipio_servico_codigo) }}"
        >
    </div>

    <div class="mb-3 col-4">
        <label for="name" class="form-label required">Descrição do Serviço no Município</label>
        <input type="text" class="form-control" name="municipio_servico_descricao"
               required value="{{ old('municipio_servico_descricao', $empresa->municipio_servico_descricao) }}"
        >
    </div>

    <div class="mb-3 col-2">
        <label for="name" class="form-label required">Nat.Operação</label>
        <input type="text" class="form-control" name="municipio_servico_descricao"
               required value="{{ old('municipio_servico_descricao', $empresa->municipio_servico_descricao) }}"
        >
    </div>

    <div class="mb-3 col-2">
        <label class="form-label required">Tributos</label>
        <input type="number" step="0.01" class="form-control" name="tributos"
               required value="{{ old('tributos', $model->tributos) }}"
        >
    </div>

    <div class="mb-3 col-2">
        <label for="name" class="form-label">Último RPS</label>
        <input type="text" class="form-control" name="ultimo_rps_liberado"
               value="{{ old('ultimo_rps_liberado', $empresa->ultimo_rps_liberado) }}"
        >
    </div>


</div>

<div class="row">

    <div class="mb-3 col-1">
        <label class="form-label required">Cofins</label>
        <input type="number" step="0.01" class="form-control" name="cofins"
               required value="{{ old('cofins', $model->cofins) }}"
        >
    </div>

    <div class="mb-3 col-1">
        <label class="form-label required">CSLL</label>
        <input type="number" step="0.01" class="form-control" name="csll"
               required value="{{ old('csll', $model->csll) }}"
        >
    </div>

    <div class="mb-3 col-1">
        <label class="form-label required">INSS</label>
        <input type="number" step="0.01" class="form-control" name="inss"
               required value="{{ old('inss', $model->inss) }}"
        >
    </div>

    <div class="mb-3 col-1">
        <label class="form-label required">IR</label>
        <input type="number" step="0.01" class="form-control" name="ir"
               required value="{{ old('ir', $model->ir) }}"
        >
    </div>

    <div class="mb-3 col-1">
        <label class="form-label required">PIS</label>
        <input type="number" step="0.01" class="form-control" name="pis"
               required value="{{ old('pis', $model->pis) }}"
        >
    </div>

    <div class="mb-3 col-1">
        <label class="form-label required">ISS</label>
        <input type="number" step="0.01" class="form-control" name="iss"
               required value="{{ old('iss', $model->iss) }}"
        >
    </div>

    <div class="mb-3 col-2">
        <div class="form-label">ISS Retido Fonte</div>
        <label class="form-check form-switch">
            <input class="form-check-input" type="checkbox" value="1" name="iss_retido_fonte"
                {{ old('iss_retido_fonte', $empresa->iss_retido_fonte) ? 'checked' : '' }}
            >
        </label>
    </div>

</div>
