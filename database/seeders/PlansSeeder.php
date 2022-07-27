<?php

namespace Database\Seeders;

use App\Models\Plan;
use App\Models\PlanFeature;
use App\Models\Role;
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

        $planoBasico = Plan::firstOrNew([
            'name' => 'Básico',
        ]);
        $planoBasico->description = 'Plano Básico com pagamento mensal';
        $planoBasico->price_month = 99;
        $planoBasico->price_quarter = (99*3)*0.97;
        $planoBasico->price_semester = (99*6)*0.93;
        $planoBasico->price_year = (99*12)*0.88;
        $planoBasico->features = $features;
        $planoBasico->save();
    }
}
