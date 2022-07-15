<?php

namespace App\Services;

use App\Models\Cnae;

class Ibge
{
    public function importCNAE()
    {
        $httpClient = new \GuzzleHttp\Client([
            'base_uri' => 'https://servicodados.ibge.gov.br/api/v2/cnae/subclasses',
        ]);

        $ibgeCnaes = json_decode($httpClient->request('GET')->getBody()->getContents(), true);

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
