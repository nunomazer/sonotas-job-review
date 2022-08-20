<div class="col-md-12 col-lg-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Serviços mais vendidos em {{ $periodo }}</h3>
        </div>
        <div class="card-table table-responsive">
            <table class="table table-vcenter">
                <thead>
                <tr>
                    <th>Serviço</th>
                    <th>Quantidade</th>
                    <th>Faturamento</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($servicosMaisVendidos->unique('id') as $s)
                    <tr>
                        <td>
                            {{ $s->nome }}
                        </td>
                        <td class="text-muted">
                            {{ $s->qtde }}
                        </td>
                        <td class="text-muted">
                            R$ {{ number_format($s->valor, 2, ',', '.') }}
                        </td>
                        <td>
                            <div id="servico_chart_{{$s->id}}"></div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@push('js')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            @foreach($servicosMaisVendidos as $s)
                var opt_chart_{{$s->id}} = {
                    series: [{
                        data: {!! json_encode($s->serie) !!}
                    }],
                    chart: {
                        type: 'line',
                        width: 150,
                        height: 30,
                        sparkline: {
                            enabled: true
                        }
                    },
                    stroke: {
                        width: 1
                    },
                    tooltip: {
                        fixed: {
                            enabled: false
                        },
                        x: {
                            show: false
                        },
                        y: {
                            title: {
                                formatter: function (seriesName) {
                                    return ''
                                }
                            }
                        },
                        marker: {
                            show: false
                        }
                    }
                };

                var chart_{{$s->id}} = new ApexCharts(document.querySelector("#servico_chart_{{$s->id}}"), opt_chart_{{$s->id}});
                chart_{{$s->id}}.render();
            @endforeach
        });
    </script>
@endpush
