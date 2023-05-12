<?php

return [
    'default' => env('MONEYFLOW_DEFAULT_DRIVER', 'eduzz'),

    'drivers' => [
        'safe2pay' => [
            'base_class' => \App\Services\MoneyFlow\Drivers\Safe2Pay\Safe2PayDriver::class,
            'base_url' => env('SAFE2PAY_BASE_URL','safe2pay.com.br'),
            'api_token_sandbox' => env('SAFE2PAY_API_TOKEN_SANDBOX'),
            'api_token_production' => env('SAFE2PAY_API_TOKEN_PRODUCTION'),
            'api_secret_key' => env('SAFE2PAY_API_SECRET_KEY'),
            'production' => env('SAFE2PAY_PRODUCTION', false),
        ],
        'eduzz' => [ // @TODO Corrigir as variáveis para o driver de acordo com o .env
            'base_class' => \App\Services\MoneyFlow\Drivers\Eduzz\EduzzDriver::class,
            'base_url' => env('EDUZZ_BASE_URL'),
            'api_token_sandbox' => env('EDUZZ_CLIENT_TOKEN'),
            'api_token_production' => env('SAFE2PAY_API_TOKEN_PRODUCTION'),
            'api_secret_key' => env('SAFE2PAY_API_SECRET_KEY'),
            'production' => env('SAFE2PAY_PRODUCTION', false),
        ],
    ],
];
