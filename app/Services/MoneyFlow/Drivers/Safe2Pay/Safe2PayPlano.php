<?php

namespace App\Services\MoneyFlow\Drivers\Safe2Pay;

use App\Models\Plan;
use App\Services\MoneyFlow\IMoneyFlowPlano;
use Illuminate\Support\Facades\Log;
use mysql_xdevapi\Exception;

class Safe2PayPlano implements IMoneyFlowPlano
{
    use Safe2PayTrait;

    protected $api_sub_domain = 'services';
    protected $has_sandbox = false;

    const CODESNAMES = [
        'month' => 1,
        'quarter' => 3,
        'semester' => 4,
        'year' => 5,
    ];

    /**
     * Atualiza ou cria um novo plano na plataforma integrada. Pelo nome base do plano. Para plataformas onde cada plano
     * tem uma cobrança em período específico, como mensal ou trimestral, esta rotina deve criar planos com nomes
     * que identifiquem esta divisão pois a modelagem prevê campos de valores para estes períodos.
     *
     * @param Plan $plan
     * @return Plan
     */
    public function updateOrCreate(Plan $plan) : Plan
    {
        $http = $this->httpClient();

        if($plan->driver_id) {

        }

        return $this->create($plan);
    }

    private function create(Plan $plan) : ?Plan
    {
        $planDriver = [
            'PlanOption' => 2,
            'PlanFrequence' => self::CODESNAMES[$plan->frequence],
            'Name' => $plan->name,
            'Description' => $plan->description,
            'Amount' => $plan->price,
            'IsImmediateCharge' => true,
            'DaysBeforeChargeDateExpiration' => 5,
            'Instruction' => '',
        ];

        $http = $this->httpClient();

        try {
            $result = $http->post('/Recurrence/V1/Plans', [
                'json' => $planDriver,
            ]);

            $result = json_decode($result->getBody()->getContents(), true);

            if ($result['success']) {
                $plan->driver = (new Safe2PayDriver())->nome();
                $plan->driver_id = $result['data']['idPlan'];
                $plan->update();
                return $plan;
            }

            Log::error('Erros no retorno de criação de plano safe2pay',$result);
            throw new \Exception($result['Title']);
        } catch (Exception $exception) {
            Log::error($exception);
            return null;
        }
    }

}
