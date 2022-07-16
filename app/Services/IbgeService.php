<?php

namespace App\Services;

use App\Models\Cnae;

class IbgeService
{
    public function importCNAE()
    {
        $file = file_get_contents(database_path('seeders/files/cnae_subclasses.json'));

        $ibgeCnaes = json_decode($file, true);

        Cnae::unguard();
        foreach ($ibgeCnaes as $ibgeCnae) {
            $cnae = Cnae::updateOrCreate([
                'codigo' => $ibgeCnae['id'],
            ], [
                'descricao' => $ibgeCnae['descricao'],
            ]);
        }
        Cnae::reguard();

    }
}
