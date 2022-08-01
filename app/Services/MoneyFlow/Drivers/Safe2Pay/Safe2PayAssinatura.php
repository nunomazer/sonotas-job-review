<?php

namespace App\Services\MoneyFlow\Drivers\Safe2Pay;

use App\Models\Empresa;
use App\Models\EmpresaAssinatura;
use App\Models\Plan;
use App\Services\MoneyFlow\IMoneyFlowAssinatura;
use App\Services\MoneyFlow\MoneyFlowAssinaturaStatus;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Support\Facades\Log;
use mysql_xdevapi\Exception;

class Safe2PayAssinatura implements IMoneyFlowAssinatura
{
    use Safe2PayTrait;

    protected $api_sub_domain = 'services';
    protected $has_sandbox = false;

    public function create(Empresa $empresa, Plan $plan, array $config): ?EmpresaAssinatura
    {
        throw_if( ! $plan->driver_id, 'O plano informado para assinatura não possui o id do driver Safe2Pay');

        $payload = [
            'PaymentMethod' => 2, // TODO verificar e adequar para boleto, por hora somente cartão
            'Customer' => [
                'Name' => $empresa->nome,
                'Identity' => $empresa->documento,
                'Email' => $empresa->email,
                'Address' => [
                    'Street' => $empresa->logradouro,
                    'Number' => $empresa->numero,
                    'District' => $empresa->bairro,
                    'ZipCode' => $empresa->cep,
                    'Complement' => $empresa->complemento,
                    'City' => [
                        'CodeIBGE' => $empresa->cidade->ibge_id
                    ],
                ],
            ],
            'Emails' => [$empresa->email],
            'Token' => $config['cartao_credito']
        ];

        $http = $this->httpClient();

        try {
            $result = $http->post('/Recurrence/V1/Plans/' . $plan->driver_id . '/Subscriptions', [
                'json' => $payload,
                'http_errors' => false,
            ]);

            $result = json_decode($result->getBody()->getContents(), true);

            $assinatura = EmpresaAssinatura::where('empresa_id', $empresa->id)
                ->where('plan_id', $plan->id)
                ->first();

            $historico = $assinatura->statu_historico;

            if ($result['success'] ?? false) {
                $assinatura->driver = (new Safe2PayDriver())->nome();
                $assinatura->driver_id = $result['data']['idSubscription'];
                $assinatura->status = MoneyFlowAssinaturaStatus::getValor($result['data']['idSubscription']);

                $historico[now()->format('Y-m-d H:i:s')] = 'Pagamento disparado';
            } else {
                Log::error('Erros no retorno de criação de assinatura safe2pay', $result);

                foreach ($result['Errors'] as $error) {
                    $historico[now()->format('Y-m-d H:i:s')] = $error['Message'];
                }
            }

            $assinatura->status_historico = $historico;
            $assinatura->update();
            return $assinatura;
        } catch (Exception $exception) {
            Log::error($exception);
            return null;
        }
    }

}
