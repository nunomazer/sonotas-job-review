<?php

namespace App\Console\Commands;

use App\Services\VendasService;
use Illuminate\Console\Command;

class GerarNFPlanejadas extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vendas:gerar-nf-planejadas';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Percorre todas as empresas gerando as NF planejadas para cada venda, caso ainda não tenha sido gerada e esteja dentro do período planejado.
                                Note que gerar as NFs é um passo anterior à sua emissão. Ao ser gerada a NF é colocada no status pendente para que o sistema possa gerenciar sua emissão.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $vendasService = new VendasService();

        $vendasService->gerarEmitirAllCompaniesNFs();
    }
}
