<?php

namespace App\Services\MoneyFlow\Drivers\Safe2Pay;

use App\Services\MoneyFlow\IMoneyFlowCartaoCredito;
use Illuminate\Support\Facades\Log;

class Safe2PayCartaoCredito implements IMoneyFlowCartaoCredito
{
    use Safe2PayTrait;

    protected $api_sub_domain = 'payment';
    protected $has_sandbox = false;

    public function tokenize(string $holder, string $cardNumber, string $expirationDate, string $securityCode): string
    {
        $http = $this->httpClient();

        $result = $http->post('/v2/token', [
            'json' => [
                'Holder' => $holder,
                'CardNumber' => $cardNumber,
                'ExpirationDate' => $expirationDate,
                'SecurityCode' => $securityCode,
            ],
        ]);

        $result = json_decode($result->getBody()->getContents(), true);

        if ($result['HasError'] ?? false) {
            throw new \Exception($result['Error'], $result['ErrorCode']);
        }

        return $result['ResponseDetail']['Token'];
    }
}
