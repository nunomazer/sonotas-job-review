<?php

namespace App\Console\Commands;

use App\Models\Empresa;
use App\Models\NFSe;
use App\Models\NFSeItemServico;
use App\Models\Servico;
use App\Services\Integra\IntegraService;
use App\Services\NFSeService;
use App\Services\Sped\SpedService;
use App\Services\Sped\Status;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

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
                'spedNfseEmitir',
                'nfseServiceCriar',
                'integraPlatformsList',
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

    public function spedNfseEmitir()
    {
        $empresa = Empresa::first();
        $cliente = $empresa->clientes->first();

        DB::beginTransaction();
        $nfse = new NFSe();
        $nfse->status = Status::PENDENTE;
        $nfse->empresa_id = $empresa->id;
        $nfse->emitido_em = now();
        $nfse->cliente_id = $cliente->id;
        $nfse->valor = Servico::first()->valor;
        $nfse->save();

        $itemServico = new NFSeItemServico();
        $itemServico->servico_id = Servico::first()->id;
        $itemServico->qtde = 1;
        $itemServico->valor = $itemServico->qtde * Servico::first()->valor;

        $nfse->itens_servico()->save($itemServico);

        DB::commit();

        $sped = new SpedService(SpedService::DOCTYPE_NFSE, 'sao_paulo');
        dd($sped->nfseDriver($nfse)->emitir());
    }

    public function nfseServiceCriar()
    {
        $empresa = Empresa::first();
        $cliente = $empresa->clientes->first();

        $nfse = new NFSe();
        $nfse->status = Status::PENDENTE;
        $nfse->empresa_id = $empresa->id;
        $nfse->emitido_em = now();
        $nfse->cliente_id = $cliente->id;
        $nfse->valor = Servico::first()->valor;

        $itemServico = new NFSeItemServico();
        $itemServico->servico_id = Servico::first()->id;
        $itemServico->qtde = 1;
        $itemServico->valor = $itemServico->qtde * Servico::first()->valor;

        $result = (new NFSeService())->create($nfse->toArray(), [$itemServico]);

        if ($result) {
            dd($result);
        }

        $this->error('Verifique o log pois um erro ocorreu');
    }

    public function integraPlatformsList()
    {
        foreach ((new IntegraService())->platforms() as $p) {
            echo $p::$name . PHP_EOL;
            dump($p::$fields);
        }
    }
}
