<?php

namespace App\Console\Commands;

use App\Models\Empresa;
use App\Services\EmpresaService;
use App\Services\Sped\SpedService;
use App\Services\VendasService;
use Illuminate\Console\Command;

class CadastraWebhookSpedDriver extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sped:cadastrar-webhook';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cadastra o Webhook Sped';

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
        $spedService = new SpedService(SpedService::DOCTYPE_NFSE);

        dump($spedService->cadastrarWebhook());
    }
}
