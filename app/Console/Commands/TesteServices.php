<?php

namespace App\Console\Commands;

use App\Models\Empresa;
use App\Services\Sped\Sped;
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
        $sped = new Sped(Sped::DOCTYPE_NFSE, 'sao_paulo');

        $empresa = Empresa::where('documento', '01713414000120')->first();
        $sped->empresa()->cadastrarEmpresa($empresa);
    }

    public function spedEmpresaAlterar()
    {
        $sped = new Sped(Sped::DOCTYPE_NFSE, 'sao_paulo');

        $empresa = Empresa::where('documento', '01713414000120')->first();
        $empresa->nome = 'Winponta ' . rand(1,10000);
        $sped->empresa()->alterarEmpresa($empresa);
    }
}
