<?php

namespace App\Console\Commands;

use App\Models\Empresa;
use App\Models\NFSe;
use App\Models\NFSeItemServico;
use App\Models\Servico;
use App\Services\NFSeService;
use App\Services\Sped\SpedService;
use Illuminate\Console\Command;

class TesteServices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'teste:service';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Testa serviços sendo implementados';

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
        $service = $this->anticipate('Escolha o serviço',[
                'spedEmpresaCadastrar',
                'spedEmpresaAlterar',
            ]);

        $this->$service();
    }

    public function spedEmpresaCadastrar()
    {
        $sped = new SpedService(SpedService::DOCTYPE_NFSE, 'sao_paulo');

        $empresa = Empresa::where('documento', '01713414000120')->first();
        dd($sped->empresaDriver($empresa)->cadastrar());
    }

    public function spedEmpresaAlterar()
    {
        $sped = new SpedService(SpedService::DOCTYPE_NFSE, 'sao_paulo');

        $empresa = Empresa::where('documento', '01713414000120')->first();
        $empresa->nome = 'Winponta ' . rand(1,10000);
        dd($sped->empresaDriver($empresa)->alterar());
    }

    public function nfseCriar()
    {
        $itemServico = new NFSeItemServico();
        $itemServico->servico_id = Servico::first()->id;

        $nfse = new NFSe();
        $nfse->empresa_id = Empresa::first()->id;
        $nfse->itens_servico()->save($itemServico);
        $nfse->quantidade = 1;
        $nfse->valor = $nfse->quantidade * Servico::first()->valor;

        dd((new NFSeService())->create($nfse));
    }
}
