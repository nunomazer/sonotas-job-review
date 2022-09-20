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
               required value="{{ old('logradouro', $model->logradouro ?? null) }}"
        >
    </div>

</div>

<div class="row">

    <div class="mb-3 col-3 col-md-2">
        <label class="form-label required">Número</label>
        <input type="text" class="form-control" name="numero"
               required value="{{ old('numero', $model->numero ?? null) }}"
        >
    </div>

    <div class="mb-3 col-9 col-md-10">
        <label class="form-label">Complemento</label>
        <input type="text" class="form-control" name="complemento"
               value="{{ old('complemento', $model->complemento ?? null) }}"
        >
    </div>

</div>

<div class="row">

    <div class="mb-3 col-6 col-md-2">
        <label class="form-label required">Bairro</label>
        <input type="text" class="form-control" name="bairro"
               required
               value="{{ old('cep', $model->bairro ?? null) }}" />
    </div>

    <div class="mb-3 col-6 col-md-2">
        <label class="form-label required">CEP</label>
        <input type="text" class="form-control" 
            name="cep"
            required
            value="{{ old('cep', $model->cep ?? null) }}"
            onblur="javascript: onChangeCEP(this.value)"
            maxlength="8" />
    </div>

    <div class="mb-3 col-12 col-md-8">
        <label class="form-label required">Cidade</label>
        <select class="form-control" id="city_id" name="city_id" required></select>
    </div>

</div>
<!-- @push('js') -->
<script type="text/javascript">
    function select2_search ($el, term) {
        $el.select2('open'); 
        var $search = $el.data('select2').dropdown.$search || $el.data('select2').selection.$search;
        $search.val(term);
        $search.trigger('input');
    }

    function onChangeCEP(cep){
        if(!cep || (cep.length != 8 && cep.length != 9)){
            return;
        }

        $.getJSON(`https://viacep.com.br/ws/${cep}/json/`, function( data ) { 
            select2_search($("#city_id"), data.ibge);
            $("input[name='logradouro']").val(data.logradouro);
            $("input[name='bairro']").val(data.bairro);

            if(data.logradouro){
                var prefixo = data.logradouro.split(' ')[0];
                $("select[name='tipo_logradouro']").val(prefixo);
            }
        });
    }
    
    $(function() {
        $('#city_id').select2({
            theme: 'bootstrap4',
            language: "pt-BR",
            placeholder: 'Infome a descrição da cidade',
            // width: '350px',
            allowClear: true,
            ajax: {
                url: "{{route('api.cidades.search')}}",
                dataType: 'json',
                delay: 500,
                data: function (params) {
                    return {
                        term: params.term || '',
                        page: params.page || 1
                    }
                },
                cache: true,
                processResults: function (data) { 
                    return {
                        results: data.data.map(item => ({...{'text': item.name}, ...item}))
                    };
                }
            },
            minimumInputLength: 2,
            templateResult: formatCidade, 
                
            <?php 
            if($model != null && !empty($model->city_id)){
            ?>
            data: [{id: <?=$model->city_id?>, text: "<?=$model->cidade->name?>"}]
            <?php } ?>
        });

    });
    
    $(document).on('select2:open', () => {
        document.querySelector('.select2-search__field').focus();
    });

    function formatCidade (cidade) {
        if (cidade.loading) {
            return cidade.text;
        }

        var $container = $(
            "<div class='select2-result-cidade clearfix'>" +
                "<div class='select2-result-cidade__meta'>" +
                    "<strong>"+ cidade.name + "</strong> - " +
                    "<span class='ms-2 text-muted'>"+ cidade.estado.name +"</span>" +
                    "<span class='ms-2 text-muted'>("+ cidade.estado.acronym +")</span>" +
                "</div>" +
            "</div>"
        );

        return $container;
    }

</script>
<!-- @endpush -->
