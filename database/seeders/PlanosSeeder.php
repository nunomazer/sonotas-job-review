<?php

namespace Database\Seeders;

use App\Models\Plan;
use App\Models\PlanFeature;
use Illuminate\Database\Seeder;

class PlanosSeeder extends Seeder
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
        $feature->value = 200;
        $feature->period = PlanFeature::PERIOD_MONTH;
        $feature->frequency = 1;
        $features[] = $feature;

        Plan::updateOrCreate([
            'name' => 'Básico mensal',
        ],
        [
            'description' => '',
            'price' => '97',
            'grace_period' => 0,
            'grace_interval' => 'day',
            'features' => $features,
            'active' => true,
            'driver' => 'Eduzz',
            'driver_id' => "so-notas_basic_monthly",
            'frequence' => 'month'
        ]);

        Plan::updateOrCreate([
            'name' => 'Básico anual',
        ],
        [
            'description' => '',
            'price' => '970',
            'grace_period' => 0,
            'grace_interval' => 'day',
            'features' => $features,
            'active' => true,
            'driver' => 'Eduzz',
            'driver_id' => "so-notas_basic_yearly",
            'frequence' => 'year'
        ]);
    }
}
