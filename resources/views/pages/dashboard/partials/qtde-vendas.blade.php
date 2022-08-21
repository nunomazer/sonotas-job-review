<div class="col-sm-6 col-lg-3">
    <div class="card card-sm">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-auto">
                    <span class="bg-green text-white avatar">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-currency-real" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M21 6h-4a3 3 0 0 0 0 6h1a3 3 0 0 1 0 6h-4"></path>
                            <path d="M4 18v-12h3a3 3 0 1 1 0 6h-3c5.5 0 5 4 6 6"></path>
                            <path d="M18 6v-2"></path>
                            <path d="M17 20v-2"></path>
                        </svg>
                    </span>
                </div>
                <div class="col">
                    <a href="{{route('vendas.list')}}">
                        <div class="font-weight-medium">
                            {{ number_format($estatisticas[\App\Services\EstatisticasService::VENDAS_MES_VALOR], 2, ',', '.') }} vendas
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
