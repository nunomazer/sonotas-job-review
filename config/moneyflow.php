<?php

return [
    'default' => env('MONEYFLOW_DEFAULT_DRIVER', 'safe2pay'),

    'safe2pay' => [
        'base_url' => env('SAFE2PAY_BASE_URL','https://api.safe2pay.com/'),
        'api_token' => env('SAFE2PAY_API_TOKEN'),
        'api_secret_key' => env('SAFE2PAY_API_SECRET_KEY'),
        'production' => env('SAFE2PAY_PRODUCTION', false),
    ]
];
