<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class IbgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        echo 'Seeding states and cities'. PHP_EOL;
        Artisan::call('ibge:import-states-cities');
        echo 'Seeding CNAE'.PHP_EOL;
        Artisan::call('ibge:import-cnae');
    }
}
