<?php

return [
    'default' => env('MONEYFLOW_DEFAULT_DRIVER', 'safe2pay'),

    'drivers' => [
        'safe2pay' => [
            'base_class' => \App\Services\MoneyFlow\Drivers\Safe2Pay\Safe2PayDriver::class,
            'base_url' => env('SAFE2PAY_BASE_URL','safe2pay.com.br/'),
            'api_token' => env('SAFE2PAY_API_TOKEN'),
            'api_secret_key' => env('SAFE2PAY_API_SECRET_KEY'),
            'production' => env('SAFE2PAY_PRODUCTION', false),
        ],
    ],
];
