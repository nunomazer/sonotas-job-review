<?php

namespace App\Console\Commands;

use App\Services\NFSeService;
use App\Services\VendasService;
use Illuminate\Console\Command;

class EmitirNFPendentes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sped:emitir-nf-pendentes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Percorre todas as empresas emitindo as NF com status pendente. Esta é uma ação de contingência pois a emissão
                            deve ser realizada por job, porém, quando não há saldo suficiente o sistema mantém o status de pendente o que
                            leva o job a não ser mais executado, dependendo desta contingência.';


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
        // TODO adicionar novos docs fiscais quando criados

        $nfseService = new NFSeService();

        $nfseService->emitirAllCompaniesNFPendentes();
    }
}
