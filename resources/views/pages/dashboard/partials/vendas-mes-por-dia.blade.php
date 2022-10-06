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
                    type: 'area',
                    width: '100%',
                    height: '90%',
                    parentHeightOffset: 0,
  			toolbar: {
  				show: false,
  			},
  			animations: {
  				enabled: false
  			},
  		},
  		dataLabels: {
  			enabled: false,
  		},
          
         
  		fill: {
  			opacity: .16,
  			type: 'solid'
  		},
  		stroke: {
  			width: 2,
  			lineCap: "round",
  			curve: "smooth",
  		},
        responsive: [{
            breakpoint: 768,
            options:{

                xaxis: {
              tickAmount: 15,
    
            }
            }
          
          
        },
        ]
          
            };

            var chart = new ApexCharts(document.querySelector("#chart-vendas-mes"), opt_chart);
            chart.render();
        });
    </script>
@endpush
