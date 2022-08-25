@extends('layouts.app')

@section('page-title', 'Venda')
@section('page-pretitle', (isset($venda) ? 'Editar venda' : 'Lançar'))

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>
                {{($venda->cliente->nome ?? 'Nova venda')}}
            </h2>
            <div class="card-actions">
                <a href="{{ route('vendas.list') }}" class="btn btn-sm btn-secondary">
                    Voltar
                </a>
            </div>
        </div>
        <div class="card-body">
            @if (isset($venda))
                <form method="POST" action="{{ route('vendas.update', [$venda]) }}">
                    @method('PUT')
            @else
                <form method="POST" action="{{ route('vendas.store') }}">
            @endif

                @csrf

                <div class="row">
                    <div class="mb-3 col-12">
                        <label class="form-label required">Empresa</label>
                        @if (isset($venda))
                            <input type="hidden" name="empresa_id" value="{{$venda->empresa->id}}">
                            <div class="form-control">
                                {{ $venda->empresa->nome }}
                            </div>
                        @else
                            <select class="form-select" required name="empresa_id">
                                @foreach($empresas as $empresa)
                                    <option value="{{$empresa->id}}"
                                        {{ old('empresa_id', $venda->empresa_id ?? '') == $empresa->id ? 'selected' : '' }}>
                                        {{$empresa->nome}}
                                    </option>
                                @endforeach
                            </select>
                        @endif
                    </div>

                    <div class="mb-3 col-12">
                        <label class="form-label required">Cliente</label>
                        @if (isset($venda))
                            <input type="hidden" name="cliente_id" value="{{$venda->cliente_id}}">
                            <div class="form-control">
                                {{ $venda->cliente->nome }}
                            </div>
                        @else
                            <select class="form-select" required name="cliente_id" id="cliente_id">
{{--                                @foreach($clientes as $cliente)--}}
{{--                                    <option value="{{$cliente->id}}"--}}
{{--                                        {{ old('cliente_id', $venda->cliente_id ?? '') == $cliente->id ? 'selected' : '' }}>--}}
{{--                                        {{$cliente->nome}}--}}
{{--                                    </option>--}}
{{--                                @endforeach--}}
                            </select>
                        @endif
                    </div>
                </div>

                <div class="row">

                    <div class="mb-3 col-2">
                        <label for="name" class="form-label required">Data da venda</label>
                        <input type="date" class="form-control" name="data_transacao"
                               required value="{{ old('data_transacao', $venda->data_transacao ?? '') }}"
                        >
                    </div>

                    <div class="mb-3 col-2">
                        <label for="name" class="form-label required">Valor</label>
                        <input type="number" step="0.01" class="form-control" name="valor" id="valor"
                               disabled required value="{{ old('valor', $valor->valor ?? '') }}"
                        >
                        <div class="form-text">Valor total da venda</div>
                    </div>


                    <div class="mb-3 col-2">
                        <label for="name" class="form-label required">Tipo NF</label>
                        <select class="form-select" required name="tipo_documento">
                            <option value="nfse" selected>
                                Serviços
                            </option>
                        </select>
                        <div class="form-text">As vendas devem especificar apenas um tipo de NF (Serviços ou Produtos)</div>
                    </div>
                </div>

                <h3>
                    Itens da venda
                    <button id="addRow" type="button" class="ms-2 btn btn-sm btn-info">+ Item</button>
                </h3>

                <div class="row">
                    <div class="col-lg-12">


                        <div id="newRow"></div>
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
    <script>
        $(function() {
            $('#cliente_id').select2({
                language: "pt",
                placeholder: 'Clique ou pressione ENTER para pesquisar o cliente',
                // width: '350px',
                allowClear: true,
                ajax: {
                    url: '{{route('api.clientes.search')}}',
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
                            results: data.data.map(item => ({...{'text': item.nome}, ...item}))
                        };
                    }
                    // processResults: function (data, params) {
                    //     // parse the results into the format expected by Select2
                    //     // since we are using custom formatting functions we do not need to
                    //     // alter the remote JSON data, except to indicate that infinite
                    //     // scrolling can be used
                    //     params.page = params.page || 1;
                    //
                    //     return {
                    //         results: data.data,
                    //         pagination: {
                    //             more: (data.current_page * data.per_page) < data.total
                    //         }
                    //     };
                    // }
                },
                minimumInputLength: 2,
                templateResult: formatCliente,
                // templateSelection: formatClienteSelection,
            });

            function initSelect2Servico() {
                $('.servico_select2').select2({
                    language: "pt",
                    placeholder: 'Clique ou pressione ENTER para pesquisar o item',
                    // width: '350px',
                    allowClear: true,
                    ajax: {
                        url: '{{route('api.servicos.search')}}',
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
                                results: data.data.map(item => ({...{'text': item.nome}, ...item}))
                            };
                        }
                        // processResults: function (data, params) {
                        //     // parse the results into the format expected by Select2
                        //     // since we are using custom formatting functions we do not need to
                        //     // alter the remote JSON data, except to indicate that infinite
                        //     // scrolling can be used
                        //     params.page = params.page || 1;
                        //
                        //     return {
                        //         results: data.data,
                        //         pagination: {
                        //             more: (data.current_page * data.per_page) < data.total
                        //         }
                        //     };
                        // }
                    },
                    minimumInputLength: 2,
                    templateResult: formatServico,
                    // templateSelection: formatClienteSelection,
                }).on('select2:select', function (e) {
                    var data = e.params.data;

                    $('#servico_valor_' + $(this).data("idx")).val(data.valor);
                    $('#servico_qtde_' + $(this).data("idx")).val(1);

                    calculaValorTotal()
                });
            }

            initSelect2Servico();

            $(document).on('select2:open', () => {
                document.querySelector('.select2-search__field').focus();
            });

            function formatCliente (cliente) {
                if (cliente.loading) {
                    return cliente.text;
                }

                var $container = $(
                    "<div class='select2-result-cliente clearfix'>" +
                        "<div class='select2-result-cliente__meta'>" +
                            "<strong>"+ cliente.nome + "</strong>" +
                            "<span class='ms-2 text-muted'>"+ cliente.documento +"</span>" +
                            " - <span class='ms-2 text-muted'>"+ cliente.email +"</span>" +
                        "</div>" +
                    "</div>"
                );

                return $container;
            }

            function formatServico (item) {
                if (item.loading) {
                    return item.text;
                }

                var $container = $(
                    "<div class='select2-result-item clearfix'>" +
                        "<div class='select2-result-item__meta'>" +
                            "<strong>"+ item.nome + "</strong>" +
                            "<span class='ms-2 text-muted'>R$ "+ item.valor +"</span>" +
                        "</div>" +
                    "</div>"
                );

                return $container;
            }

            $("#addRow").click(function () {
                addServicoRow();
            });

            // remove row
            $(document).on('click', '#removeRow', function () {
                $(this).closest('#inputFormRow').remove();
                calculaValorTotal();
            });

            function addServicoRow() {
                var html = '';
                html += '<div class="row">';
                html += '<div id="inputFormRow">'+
                    '<div class="input-group mb-3">' +
                    '<select class="form-select servico_select2" required name="servico[].id"></select>' +
                    '<input type="number" step="0.01" class="form-control ms-1" name="servico[].qtde" placeholder="Quantidade" required>' +
                    '<input type="number" step="0.01" class="form-control ms-1" name="servico[].valor" placeholder="Valor" required>' +
                    '<div class="input-group-append ms-1">' +
                    '<button id="removeRow" type="button" class="btn btn-danger">Remover</button>' +
                    '</div>' +
                    '</div>';
                html += '</div>';

                var html = '' +
                    '<div id="inputFormRow">' +
                    '<div class="input-group mb-3">' +
                    '<select class="form-select servico_select2" required name="servico[].id"' +
                    'data-idx="'+$('.servico_select2').length+'"></select>' +
                    '<input type="number" step="0.01" class="form-control ms-1 servico-qtde"' +
                    'name="servico[].qtde" id="servico_qtde_'+$('.servico_select2').length+'"' +
                    'data-idx="'+$('.servico_select2').length+'" placeholder="Quantidade" required>' +
                    '<input type="number" step="0.01" class="form-control ms-1 servico-valor"' +
                    'name="servico[].valor" id="servico_valor_'+$('.servico_select2').length+'"' +
                    'data-idx="'+$('.servico_select2').length+'" placeholder="Valor" required>' +
                    '<div class="input-group-append ms-1">' +
                    '<button id="removeRow" type="button" class="btn btn-danger">Remover</button>' +
                    '</div>' +
                    '</div>' +
                    '</div>';

                $('#newRow').append(html);

                initSelect2Servico();
                initEventValor();
            }

            function calculaValorTotal() {
                var valorTotal = 0;
                $('.servico-valor').each( function() {
                    valorTotal += parseFloat($(`#servico_qtde_${$(this).data('idx')}`).val()) * parseFloat($(this).val());
                });
                $('#valor').val(valorTotal);
            }

            function initEventValor() {
                $('.servico-qtde').on('change', calculaValorTotal);
                $('.servico-valor').on('change', calculaValorTotal);
            }

            // carrega a primeira linha do form de serviços
            addServicoRow();
            initEventValor();

        });
    </script>
@endpush
