<?php

namespace App\Services\MoneyFlow\Drivers\Eduzz;

use App\Models\Empresa;
use App\Models\EmpresaAssinatura;
use App\Models\Plan;
use App\Services\MoneyFlow\AbstractMoneyFlowAssinatura;
use App\Services\MoneyFlow\IMoneyFlowAssinatura;
use App\Services\MoneyFlow\MoneyFlowAssinaturaStatus;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Support\Facades\Log;
use mysql_xdevapi\Exception;

class EduzzAssinatura extends AbstractMoneyFlowAssinatura implements IMoneyFlowAssinatura
{
    use EduzzTrait;

    protected $api_sub_domain = 'services';
    protected $has_sandbox = false;

    public function create(Empresa $empresa, EmpresaAssinatura $assinatura, array $config): ?EmpresaAssinatura
    {
//        $payload = [
//            'Plan' => $assinatura->plano->id,
//            'PaymentMethod' => '2', // TODO verificar e adequar para boleto, por hora somente cartão
//            'Customer' => [
//                'name' => $empresa->nome,
//                'identity' => $empresa->documento,
//                'Email' => $empresa->email,
//                'Address' => [
//                    'Street' => $empresa->logradouro,
//                    'Number' => (string)$empresa->numero,
//                    'District' => $empresa->bairro,
//                    'ZipCode' => $empresa->cep,
//                    'Complement' => $empresa->complemento ?? '',
//                    'City' => [
//                        'CodeIBGE' => (string)$empresa->cidade->ibge_id
//                    ],
//                ],
//            ],
//            'Emails' => [$empresa->email],
//            'Token' => $config['cartao_credito']
//        ];
//
//        $http = $this->httpClient();
//
//        try {
//            $result = $http->post('/Recurrence/V1/Plans/' . $assinatura->plano->driver_id . '/Subscriptions', [
//                'json' => $payload,
//                'http_errors' => false,
//            ]);
//
//            $result = json_decode($result->getBody()->getContents(), true);
//
//            $historico = $assinatura->statu_historico;
//
//            // TODO tá errado, deveria retornar para o service gravar os dados no banco de dados
//            if ($result['success'] ?? false) {
//                $assinatura->driver = (new Safe2PayDriver())->nome();
//                $assinatura->driver_id = $result['data']['idSubscription'];
//                $assinatura->status = MoneyFlowAssinaturaStatus::getValor($result['data']['idSubscription']);
//
//                $historico[now()->format('Y-m-d H:i:s')] = 'Pagamento disparado';
//            } else {
//                Log::debug('Erros no retorno de criação de assinatura safe2pay');
//                Log::debug(json_encode($payload));
//                Log::error(json_encode($result));
//
//                foreach ($result['Errors'] as $error) {
//                    $historico[now()->format('Y-m-d H:i:s')] = $error['Message'];
//                }
//            }
//
//            $assinatura->status_historico = $historico;
//            $assinatura->save();
//            return $assinatura;
//        } catch (Exception $exception) {
//            Log::error($exception);
//            return null;
//        }
        return null;
    }


}
