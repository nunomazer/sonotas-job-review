<?php

namespace App\Services\Sped\Drivers\Plugnotas;

use App\Models\Cliente;
use App\Models\Empresa;
use App\Models\NFSe;
use App\Services\Sped\SpedApiReturn;
use App\Services\Sped\SpedEmpresa;
use App\Services\Sped\ISpedEmpresa;
use App\Services\Sped\SpedRegimesTributarios;
use App\Services\Sped\SpedStatus;
use Illuminate\Support\Facades\Log;

class PlugnotasWebhook
{
    use PlugnotasTrait;

    public function cadastrar()
    {
        $payload = [
            'url' => route('api.webhook.sped', (new PlugnotasDriver())->nome()),
            'method' => 'POST',
        ];

        try {
            $result = $this->httpClient()->request('POST', 'webhook', [
                'json' => $payload,
            ]);

            return json_decode($result->getBody()->getContents(), true);

        } catch (\Exception $exception) {
            Log::error('Erro ao chamar Plugnotas Cadastrar Webhook');
            Log::error($exception);
            return false;
        }
    }
}
