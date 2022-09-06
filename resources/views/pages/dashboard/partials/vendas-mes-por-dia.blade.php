<div class="card">
    <div class="card-body">
        <h3 class="card-title">R$ Vendas por dia</h3>
        <div id="chart-vendas-mes" class="chart-lg">
        </div>
    </div>
</div>

@push('js')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var opt_chart = {
                series: [{
                    data: [
                        @foreach($estatisticas[\App\Services\EstatisticasService::VENDAS_SERIE] as $s)
                            {
                                y: '{{$s->valor}}',
                                x: '{{$s->dia}}'
                            },
                        @endforeach
                    ]
                }],
                chart: {
                    type: 'bar',
                    width: '100%',
                    height: '90%',
                    
                    
                },
                responsive: [
    {
      breakpoint: 768,
      options: {
        
        
            xaxis:{
                type: 'datetime',
            }
        
        
      }
    }
  ]
            };

            var chart = new ApexCharts(document.querySelector("#chart-vendas-mes"), opt_chart);
            chart.render();
        });
    </script>
@endpush
