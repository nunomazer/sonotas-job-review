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
        $feature->value = 50;
        $feature->period = PlanFeature::PERIOD_MONTH;
        $feature->interval = 1;
        $features[] = $feature;

        $planoBasico = Plan::firstOrNew([
            'name' => 'Básico',
        ]);
        $planoBasico->description = 'Plano Básico';
        $planoBasico->price_month = 99;
        $planoBasico->features = $features;
        $planoBasico->save();
    }
}
