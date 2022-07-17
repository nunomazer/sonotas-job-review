<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Servico;
use App\Models\TipoServico;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class TipoServicosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = file_get_contents(database_path('seeders/files/servicos_lc116.json'));
        $servicosBase = json_decode($file, true);

        foreach ($servicosBase as $s) {
            TipoServico::updateOrCreate([
                'codigo' => $s['codigo'],
            ], [
                'descricao' => $s['descricao'],
            ]);
        }
    }
}
