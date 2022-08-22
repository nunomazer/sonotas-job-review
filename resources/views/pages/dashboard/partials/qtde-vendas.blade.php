<div class="col-sm-6 col-lg-3">
    <div class="card card-sm">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-auto">
                    <span class="bg-green text-white avatar">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-businessplan" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                           <ellipse cx="16" cy="6" rx="5" ry="3"></ellipse>
                           <path d="M11 6v4c0 1.657 2.239 3 5 3s5 -1.343 5 -3v-4"></path>
                           <path d="M11 10v4c0 1.657 2.239 3 5 3s5 -1.343 5 -3v-4"></path>
                           <path d="M11 14v4c0 1.657 2.239 3 5 3s5 -1.343 5 -3v-4"></path>
                           <path d="M7 9h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5"></path>
                           <path d="M5 15v1m0 -8v1"></path>
                        </svg>
                    </span>
                </div>
                <div class="col">
                    <a href="{{route('vendas.list')}}">
                        <div class="font-weight-medium">
                            R$ {{ number_format($estatisticas[\App\Services\EstatisticasService::VENDAS_MES_VALOR], 2, ',', '.') }}
                        </div>
                        <div class="text-muted">
                            {{ $estatisticas[\App\Services\EstatisticasService::VENDAS_MES_QTDE] }} vendas
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
