<?php

namespace Database\Seeders;

use App\Models\Plan;
use App\Models\PlanFeature;
use App\Models\Role;
use App\Services\MoneyFlow\MoneyFlowService;
use App\Services\PlanoService;
use Illuminate\Database\Seeder;

class PlansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $features = [];
        $feature = new PlanFeature();
        $feature->slug = PlanFeature::FEATURE_QTDE_NOTAS;
        $feature->unlimited = false;
        $feature->value = 60;
        $feature->period = PlanFeature::PERIOD_MONTH;
        $feature->frequency = 1;
        $features[] = $feature;

        $this->setTeste($features);
        /*
        $this->setBasicoMensal($features);
        $this->setBasicoTrimestral($features);
        $this->setBasicoSemestral($features);
        $this->setBasicoAnual($features);
        */
    }

    private function setTeste(array $features)
    {
        $planoService = new PlanoService();

        $planoTeste = Plan::firstOrNew([
            'name' => 'Teste Básico Mensal',
        ]);
        $planoTeste->description = 'Teste de Plano Básico com pagamento mensal';
        $planoTeste->price = 1;
        $planoTeste->frequence = 'month';
        $planoTeste->features = $features;

        $planoService->updateOrCreate($planoTeste);
    }

    private function setBasicoMensal(array $features)
    {
        $planoService = new PlanoService();

        $planoBasicoMensal = Plan::firstOrNew([
            'name' => 'Básico Mensal',
        ]);
        $planoBasicoMensal->description = 'Plano Básico com pagamento mensal';
        $planoBasicoMensal->price = 97;
        $planoBasicoMensal->frequence = 'month';
        $planoBasicoMensal->features = $features;

        $planoService->updateOrCreate($planoBasicoMensal);
    }

    private function setBasicoTrimestral(array $features)
    {
        $planoService = new PlanoService();

        $planoBasicoTrimestral = Plan::firstOrNew([
            'name' => 'Básico Trimestral',
        ]);
        $planoBasicoTrimestral->description = 'Plano Básico com pagamento trimestral';
        $planoBasicoTrimestral->price = 277;
        $planoBasicoTrimestral->frequence = 'quarter';
        $planoBasicoTrimestral->features = $features;

        $planoService->updateOrCreate($planoBasicoTrimestral);
    }

    private function setBasicoSemestral(array $features)
    {
        $planoService = new PlanoService();

        $planoBasicoSemestral = Plan::firstOrNew([
            'name' => 'Básico Semestral',
        ]);
        $planoBasicoSemestral->description = 'Plano Básico com pagamento semestral';
        $planoBasicoSemestral->price = 517;
        $planoBasicoSemestral->frequence = 'semester';
        $planoBasicoSemestral->features = $features;

        $planoService->updateOrCreate($planoBasicoSemestral);
    }

    private function setBasicoAnual(array $features)
    {
        $planoService = new PlanoService();

        $planoBasicoAnual = Plan::firstOrNew([
            'name' => 'Básico Anual',
        ]);
        $planoBasicoAnual->description = 'Plano Básico com pagamento anual';
        $planoBasicoAnual->price = 970;
        $planoBasicoAnual->frequence = 'year';
        $planoBasicoAnual->features = $features;

        $planoService->updateOrCreate($planoBasicoAnual);
    }
}
