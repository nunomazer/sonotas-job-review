<h3 class="strong border-top border-bottom p-1">Endereço</h3>

<div class="row">

    <div class="mb-3 col-2">
        <label class="form-label">Tipo</label>
        <select class="form-select" name="tipo_logradouro">
            @foreach(\App\Models\TipoLogradouro::tipos as $tipo)
                <option value="{{$tipo}}"
                    {{ old('tipo_logradouro', $model->tipo_logradouro ?? '') == $tipo ? 'selected' : '' }}>
                        {{$tipo}}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3 col-10">
        <label class="form-label required">Logradouro / Endereço</label>
        <input type="text" class="form-control" name="logradouro"
               required value="{{ old('logradouro', $model->logradouro) }}"
        >
    </div>

</div>

<div class="row">

    <div class="mb-3 col-2">
        <label class="form-label">Número</label>
        <input type="text" class="form-control" name="numero"
               required value="{{ old('numero', $model->numero) }}"
        >
    </div>

    <div class="mb-3 col-10">
        <label class="form-label">Complemento</label>
        <input type="text" class="form-control" name="complemento"
               value="{{ old('complemento', $model->complemento) }}"
        >
    </div>

</div>

<div class="row">

    <div class="mb-3 col-2">
        <label class="form-label">Bairro</label>
        <input type="text" class="form-control" name="bairro"
               required
               value="{{ old('cep', $model->bairro) }}"
        >
    </div>

    <div class="mb-3 col-2">
        <label class="form-label">CEP</label>
        <input type="text" class="form-control" name="cep"
               required
               value="{{ old('cep', $model->cep) }}"
        >
    </div>

    <div class="mb-3 col-8">
        <label class="form-label">Cidade</label>
        <select class="form-select" name="city_id">
            @foreach(\App\Models\Cidade::all() as $cidade)
                <option value="{{$cidade->id}}"
                    {{ old('city_id', $model->city_id ?? '') == $cidade->id ? 'selected' : '' }}>
                    {{$cidade->estado->acronym}} - {{$cidade->name}}
                </option>
            @endforeach
        </select>
    </div>

</div>
