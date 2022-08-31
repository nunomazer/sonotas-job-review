<?php

namespace App\Console\Commands;

use App\Models\Empresa;
use App\Services\Sped\SpedService;
use App\Services\VendasService;
use Illuminate\Console\Command;

class AtualizarDocsSpedDriver extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sped:atualizar-status-docs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Percorre todas as empresas atualizando os statis das  NF';

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
        Empresa::all()->each(function ($d) {
            $es = new SpedService(SpedService::DOCTYPE_NFSE, $d->cidade->name);
            $eee = $es->empresaDriver($d);
            $eee->atualizarStatusDocsProcessamento();
        });
        $vendasService = new VendasService();

        $vendasService->gerarEmitirAllCompaniesNFs();
    }
}
