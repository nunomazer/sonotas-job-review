<?php

namespace App\Console\Commands;

use App\Models\Empresa;
use App\Services\EmpresaService;
use App\Services\Sped\SpedService;
use App\Services\VendasService;
use Illuminate\Console\Command;

class AtualizarStatusCancelamentoNFSeSpedDriver extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sped:atualizar-status-cancelamentos-nfse';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Percorre todas as empresas atualizando os status de cancelamentos das NFSe';

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
        $empresaService = new EmpresaService();

        Empresa::isAtivo()->get()->each(
            function ($empresa) use ($empresaService) {
                $empresaService->atualizarStatusNFseEmCancelamentos($empresa);
        });
    }
}
