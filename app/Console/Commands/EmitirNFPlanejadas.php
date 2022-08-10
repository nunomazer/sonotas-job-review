<?php

namespace App\Console\Commands;

use App\Services\VendasService;
use Illuminate\Console\Command;

class EmitirNFPlanejadas extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vendas:emitir-nf-planejadas';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Percorre todas as empresas emitindo as NF planejadas para cada venda, caso ainda não tenha sido emitida e esteja dentro do período planejado';

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
