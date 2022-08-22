<div class="col-sm-6 col-lg-3">
    <div class="card card-sm">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-auto">
                    <span class="bg-secondary text-white avatar">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-receipt-tax" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                           <line x1="9" y1="14" x2="15" y2="8"></line>
                           <circle cx="9.5" cy="8.5" r=".5" fill="currentColor"></circle>
                           <circle cx="14.5" cy="13.5" r=".5" fill="currentColor"></circle>
                           <path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16l-3 -2l-2 2l-2 -2l-2 2l-2 -2l-3 2"></path>
                        </svg>
                    </span>
                </div>
                <div class="col">
                    <a href="{{route('notas-servico.list')}}">
                        <div class="font-weight-medium">
                            {{ $estatisticas[\App\Services\EstatisticasService::NF_EMITIDAS_QTDE] }} NFs emitidas
                        </div>
                        <div class="text-muted">
                            {{ $estatisticas[\App\Services\EstatisticasService::NF_PENDENTES_QTDE] }} planejadas
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
