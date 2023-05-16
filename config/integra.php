<?php

return [
    /**
     * Configuração de cada driver que pode ser usado pela facade Sped para emitir o documento fiscal, de acordo
     * com as configurações dos próximos blocos de configuração por tipo de doc fiscal.
     */
    'drivers' => [
        'eduzz' => [
            'base_url' => env('EDUZZ_BASE_URL','https://api-devhub.eduzz.com'),
            'api_url' => env('EDUZZ_API_URL','https://sandbox-api.eduzz.com'),
            'base_class' => \App\Services\Integra\Drivers\Eduzz\EduzzPlatform::class,
            'app_id' => env('EDUZZ_ACCOUNTS_APP_ID', '9b9873bb-a50f-434f-8491-ef033a73a637'),
            'app_secret' => env('EDUZZ_ACCOUNTS_APP_SECRET'),
            'app_slug' => env('EDUZZ_APP_SLUG', 'so-notas'),
            'signature_url' => env('EDUZZ_SIGNATURE_URL', '"https://subscription-status-api-staging.store.eduzz.com"'),
            'oauth_url' => env('EDUZZ_OAUTH_URL','https://accounts.testzz.ninja'),
            'oauth_url_api' => env('EDUZZ_OAUTH_URL_API', "https://accounts-api.testzz.ninja"),
            'redirect_url' => env('EDUZZ_REDIRECT_URL', config('app.url').'/eduzz/oauth-confirmation'),
            'clientToken' => env('EDUZZ_CLIENT_TOKEN'),
        ],
    ],

];
