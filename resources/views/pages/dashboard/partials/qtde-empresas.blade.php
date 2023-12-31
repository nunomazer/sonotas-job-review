<div class="col-sm-6 col-lg-3">
    <div class="card card-sm">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-auto">
                    <span class="bg-blue text-white avatar">
                        <!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-building" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                           <line x1="3" y1="21" x2="21" y2="21"></line>
                           <line x1="9" y1="8" x2="10" y2="8"></line>
                           <line x1="9" y1="12" x2="10" y2="12"></line>
                           <line x1="9" y1="16" x2="10" y2="16"></line>
                           <line x1="14" y1="8" x2="15" y2="8"></line>
                           <line x1="14" y1="12" x2="15" y2="12"></line>
                           <line x1="14" y1="16" x2="15" y2="16"></line>
                           <path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16"></path>
                        </svg>
                    </span>
                </div>
                <div class="col">
                    <a href="{{route('empresas.list')}}">
                        <div class="font-weight-medium">
                            {{ $estatisticas[\App\Services\EstatisticasService::EMPRESAS_ATIVAS_QTDE] }} empresa(s) ativa(s)
                        </div>
                        <div class="text-muted">
                            {{ $estatisticas[\App\Services\EstatisticasService::EMPRESAS_TOTAL_QTDE] }} no total
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
