<div class="col-sm-6 col-lg-3">
    <div class="card card-sm">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-auto">
                    <span class="bg-azure text-white avatar">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-hammer" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                           <path d="M11.414 10l-7.383 7.418a2.091 2.091 0 0 0 0 2.967a2.11 2.11 0 0 0 2.976 0l7.407 -7.385"></path>
                           <path d="M18.121 15.293l2.586 -2.586a1 1 0 0 0 0 -1.414l-7.586 -7.586a1 1 0 0 0 -1.414 0l-2.586 2.586a1 1 0 0 0 0 1.414l7.586 7.586a1 1 0 0 0 1.414 0z"></path>
                        </svg>
                    </span>
                </div>
                <div class="col">
                    <a href="{{route('servicos.list')}}">
                        <div class="font-weight-medium">
                            {{ $estatisticas[\App\Services\EstatisticasService::SERVICOS_ATIVOS_QTDE] }} serviço(s) ativo(s)
                        </div>
                        <div class="text-muted">
                            {{ $estatisticas[\App\Services\EstatisticasService::SERVICOS_TOTAL_QTDE] }} no total
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
