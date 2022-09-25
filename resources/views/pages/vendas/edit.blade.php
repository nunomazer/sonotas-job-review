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
                            <input type="hidden" name="id" value="{{$venda->id}}">
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
                    <div class="mb-3 col-12 col-lg-3">
                        <label for="name" class="form-label required">Tipo NF</label>
                        <select class="form-select" required name="tipo_documento">
                            <option value="nfse" selected>
                                Serviços
                            </option>
                        </select>
                        <div class="form-text">As vendas devem especificar apenas um tipo de NF (Serviços ou Produtos)</div>
                    </div>

                    <div class="mb-3 col-12 col-lg-3">
                        <label class="form-label required">Data da venda</label>
                        <input type="date" class="form-control" name="data_transacao"
                               required value="{{ old('data_transacao', $venda->data_transacao->format('Y-m-d') ?? now()->format('Y-m-d')) }}"
                        >
                    </div>

                    <div class="mb-3 col-12 col-lg-3">
                        <label class="form-label">Data planejada NF</label>
                        <input type="date" class="form-control" name="data_emissao_planejada"
                               value="{{ old('data_transacao', $venda->data_transacao ?? '') }}"
                        >
                        <div class="form-text">
                            Data planejada para emitir a NF (Serviços ou Produtos), deixe em branco para emissão após
                            salvar a venda ou de acordo com as configurações padrões da empresa.
                        </div>
                    </div>

                    <div class="mb-3 col-12 col-lg-3">
                        <label for="name" class="form-label required">Descontos</label>
                        <input type="number" step="0.01" class="form-control" name="desconto" id="desconto"
                            required value="{{ old('desconto', $venda->desconto ?? '0') }}"
                        >
                    </div> 
                </div>

                <h3>
                    Itens da venda
                    <button id="addRow" type="button" class="ms-2 btn btn-sm btn-info">+ Item</button>
                </h3>
                <hr />
                <div class="row">
                    <div class="col-5">Descrição</div>
                    <div class="col-2">Quantidade</div>
                    <div class="col-2">Valor unitário</div>
                    <div class="col-2">Valor total</div>
                    <div class="col-1">Remover</div>
                </div>
                <div class="row">
                    <div id="newRow">
                        <?php
                        //dd($venda->itens);
                        ?>
                        @if(!empty($venda->itens))
                        @foreach($venda->itens as $idx => $vendaItem)
                        <div class="row linhaItem"> 
                            <div class="input-group mb-3">
                                <div class="col-5">
                                    <select class="form-select servico_select2" required  
                                        name="servico[{{$idx}}][id]"
                                        value="{{$vendaItem->id}}"
                                        data-idx="{{$idx}}">
                                        <option selected value="{{$vendaItem->item_id}}">{{$vendaItem->servico->nome}}</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <input type="number" step="0.01" class="form-control ms-1 servico-qtde" 
                                        name="servico[{{$idx}}][qtde]" 
                                        id="servico_qtde_{{$idx}}"
                                        value="{{$vendaItem->qtde}}"
                                        data-idx="{{$idx}}" placeholder="Quantidade" required />
                                </div>
                                <div class="col-2">
                                    <input type="number" step="0.01" class="form-control ms-1 servico-valor" 
                                        name="servico[{{$idx}}][valor]" 
                                        id="servico_valor_{{$idx}}"
                                        value="{{$vendaItem->valor}}"
                                        data-idx="{{$idx}}" placeholder="Valor" required />
                                </div>
                                <div class="col-2">
                                    <input type="number" step="0.01" class="form-control ms-1 servico-valor-total" 
                                        id="servico_valor_total_{{$idx}}"
                                        data-idx="{{$idx}}" placeholder="Total" readonly="readonly" required />
                                </div>
                                <div class="col-1">
                                    <div class="input-group-append ms-1 text-center">
                                        <button id="removeRow" type="button" class="btn btn-danger text-center">
                                            <svg style="margin-left:5px" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <line x1="4" y1="7" x2="20" y2="7"></line>
                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>

                <hr />
                <div class="row">
                    <div class="mb-3 col-10">
                        <label for="name" class="form-label">Informações complementares</label>
                        <textarea class="form-control" style="width: 100%; min-height: 80px; max-height:120px" name="info_adicional" 
                            maxlength="4000">{{old('info_adicional', $venda->info_adicional ?? '')}}</textarea> 
                    </div>
                    <div class="mb-3 col-2">
                        <label for="name" class="form-label required">Valor total</label>
                        <input type="number" step="0.01" class="form-control" name="valor" id="valor"
                               readonly="readonly" required value="{{ old('valor', $valor->valor ?? '0') }}"
                        >
                        <div class="form-text">Valor total da venda</div>
                    </div>
                </div>

                <hr />
                
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="{{ route('vendas.list') }}" class="btn btn-secondary">
                    Voltar
                </a>
            </form>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(function() {
            // para controlar o indice da linha de serviço no form
            // somente pode aumentar para cada nova linha
            let servicoIdx = 0;

            $('#cliente_id').select2({
                theme: 'bootstrap4',
                language: "pt-BR",
                placeholder: 'Clique ou pressione ENTER para pesquisar o cliente',
                // width: '350px',
                allowClear: true,
                ajax: {
                    url: '{{route("api.clientes.search")}}',
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
                },
                minimumInputLength: 2,
                templateResult: formatCliente,
                // templateSelection: formatClienteSelection,
            });

            function initSelect2Servico() {
                $('.servico_select2').select2({                    
                    theme: 'bootstrap4',
                    language: "pt-BR",
                    placeholder: 'Clique ou pressione ENTER para pesquisar o item',
                    // width: '350px',
                    allowClear: true,
                    ajax: {
                        url: "{{route('api.servicos.search')}}",
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
                $(this).closest('.linhaItem').remove();
                calculaValorTotal();
            });

            function addServicoRow() {
                servicoIdx++;

                var html = `<div class="row linhaItem"> 
                    <div class="input-group mb-3">
                        <div class="col-5">
                            <select class="form-select servico_select2" required  
                                name="servico[${servicoIdx}][id]"
                                data-idx="${servicoIdx}"></select>
                        </div>
                        <div class="col-2">
                            <input type="number" step="0.01" class="form-control ms-1 servico-qtde" 
                                name="servico[${servicoIdx}][qtde]" 
                                id="servico_qtde_${servicoIdx}"
                                data-idx="${servicoIdx}" placeholder="Quantidade" required />
                        </div>
                        <div class="col-2">
                            <input type="number" step="0.01" class="form-control ms-1 servico-valor" 
                                name="servico[${servicoIdx}][valor]" 
                                id="servico_valor_${servicoIdx}"
                                data-idx="${servicoIdx}" placeholder="Valor" required />
                        </div>
                        <div class="col-2">
                            <input type="number" step="0.01" class="form-control ms-1 servico-valor-total" 
                                id="servico_valor_total_${servicoIdx}"
                                data-idx="${servicoIdx}" placeholder="Total" readonly="readonly" required />
                        </div>
                        <div class="col-1">
                            <div class="input-group-append ms-1 text-center">
                                <button id="removeRow" type="button" class="btn btn-danger text-center">
                                    <svg style="margin-left:5px" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <line x1="4" y1="7" x2="20" y2="7"></line>
                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>`;

                $('#newRow').append(html);

                initSelect2Servico();
                initEventValor();
            }

            function calculaValorTotal() {
                var valorTotal = 0;
                var txtDesconto = $("#desconto").val();
                if(isNaN(txtDesconto)){
                    txtDesconto = 0;
                }
                var valorDesconto = parseFloat(txtDesconto);
                $('.servico-valor').each( function() {
                    valorLinha = parseFloat($(`#servico_qtde_${$(this).data('idx')}`).val()) * parseFloat($(this).val());
                    valorTotal += valorLinha;
                    $(`#servico_valor_total_${$(this).data('idx')}`).val(valorLinha.toFixed(2));
                });
                valorTotal -= valorDesconto;
                $('#valor').val(valorTotal.toFixed(2));
            }

            function initEventValor() {
                $('.servico-qtde').on('change', calculaValorTotal); 
                $('.servico-valor').on('change', calculaValorTotal); 
                $('#desconto').on('change', calculaValorTotal); 
            }

            // carrega a primeira linha do form de serviços
            <?=(empty($venda->itens) ? "addServicoRow();" : "calculaValorTotal();") ?>
            initEventValor();

            
        });
    </script>
@endpush
