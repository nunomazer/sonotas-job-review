<?php

namespace App\Console\Commands;

use App\Models\Empresa;
use App\Models\Integracao;
use App\Models\NFSe;
use App\Models\NFSeItemServico;
use App\Models\Plan;
use App\Models\Servico;
use App\Services\Integra\IntegraService;
use App\Services\MoneyFlow\MoneyFlowService;
use App\Services\NFSeService;
use App\Services\ServicoService;
use App\Services\Sped\SpedService;
use App\Services\Sped\SpedStatus;
use App\Services\VendasService;
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
        $choices = collect([
            'spedEmpresaCadastrar' => 'Sped Cadastrar Empresa',
            'spedEmpresaAlterar' => 'Sped Empresa Alterar',
            'spedNfseEmitir' => 'Sped NFSe Emitir',
            'moneyServicePlanUpdateOrCreate' => 'Money Flow Plano Update or Create',
            'moneyServiceTokenize' => 'Money Flow Tokenizar um Cartão do .env',
            'nfseServiceCriar' => 'NFSe Service: Criar NFSe',
            'vendasServiceSyncPlatformEmpresaMktDigital' => 'Vendas Service: Sincronizar da plataforma Eduzz emrpesa Mkt Digital',
            'integraPlatformsList' => 'Integra: Lista Plataformas',
            'integraEduzzAuth' => 'Integra: Eduzz Auth (gera token)',
            'integraEduzzGetServicos' => 'Integra: Eduzz Get Serviços',
            'integraGetVendas' => 'Integra: Eduzz Get Vendas',
            'servicoServiceSyncPlatformAdemir' => 'Servico Service: Sync Serviços Plataforma (Eduzz) Ademir',
            'servicoServiceSyncPlatformMktDigital' => 'Servico Service: Sync Serviços Plataforma (Eduzz) empresa mkt Digital',
        ])->sort();

        $service = $this->choice('Escolha o serviço', $choices->toArray());

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
        $nfse->status = SpedStatus::PENDENTE;
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
        $nfse->status = SpedStatus::PENDENTE;
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
        foreach ((new IntegraService())->platformsDriverClasses() as $p) {
            echo $p::$name . PHP_EOL;
            dump($p::$fields);
        }
    }

    public function integraEduzzGetServicos()
    {
        $empresaIntegracao = Integracao::first();

        $integracao = (new IntegraService())->driver('eduzz', $empresaIntegracao->fields);
        dd($integracao->getServicos());
    }

    public function servicoServiceSyncPlatformAdemir()
    {
        $servicoService = new ServicoService();

        $empresa = Empresa::first();

        dd($servicoService->syncFromPlatform($empresa, 'eduzz'));
    }

    public function integraGetVendas()
    {
        $empresa = Empresa::where('nome', 'like', '%Mkt%')->first();
        $empresaIntegracao = Integracao::where('empresa_id', $empresa->id)->first();

        $integracao = (new IntegraService())->driver('eduzz', $empresaIntegracao->fields);
        dd($integracao->getVendas('2022-01-01 00:00'));
    }

    public function servicoServiceSyncPlatformMktDigital()
    {
        $servicoService = new ServicoService();

        $empresa = Empresa::where('nome', 'like', '%Mkt%')->first();
        $empresaIntegracao = Integracao::where('empresa_id', $empresa->id)->first();

        dd($servicoService->syncFromPlatform($empresa, 'Eduzz'));
    }

    public function vendasServiceSyncPlatformEmpresaMktDigital()
    {
        $vendasService = new VendasService();

        $empresa = Empresa::where('nome', 'like', '%Mkt%')->first();
        $empresaIntegracao = Integracao::where('empresa_id', $empresa->id)->first();

        dd($vendasService->syncFromPlatform($empresa, 'Eduzz', '2022-07-01'));
    }

    public function moneyServicePlanUpdateOrCreate()
    {
        $mfService = new MoneyFlowService();

        $planoDriver = $mfService->planoDriver();

        $plan = Plan::first();
        dd($planoDriver->updateOrCreate($plan));
    }

    public function moneyServiceTokenize()
    {
        $mfService = new MoneyFlowService();

        $ccDriver = $mfService->cartaoCreditoDriver();

        dd($ccDriver->tokenize(
            env('CC_TEST_HOLDER'),
            env('CC_TEST_NUMBER'),
            env('CC_TEST_VALIDATE'),
            env('CC_TEST_SECURITY_CODE'),
        ));
    }
}
