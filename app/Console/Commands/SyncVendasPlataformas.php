<?php

namespace App\Console\Commands;

use App\Services\VendasService;
use Illuminate\Console\Command;

class SyncVendasPlataformas extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:vendas-plataformas';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Executa a sincronização com todas as integrações de plataformas configuradas';

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

        $vendasService->syncAllCompaniesFromPlatforms();
    }
}
