<?php

namespace Database\Seeders;

use App\Models\Plan;
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
        Plan::create([
            'name' => 'Básico mensal',
            'description' => '',
            'price' => '97',
            'grace_period' => 0,
            'grace_interval' => 'day',
            'features' => [],
            'active' => true,
            'driver' => 'Eduzz',
            'driver_id' => "so-notas_basic_monthly",
            'frequence' => 'month'
        ]);

        Plan::create([
            'name' => 'Básico anual',
            'description' => '',
            'price' => '970',
            'grace_period' => 0,
            'grace_interval' => 'day',
            'features' => [],
            'active' => true,
            'driver' => 'Eduzz',
            'driver_id' => "so-notas_basic_yearly",
            'frequence' => 'year'
        ]);
    }
}
