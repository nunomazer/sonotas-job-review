<?php

return [
    /**
     * Configuração de cada driver que pode ser usado pela facade Sped para emitir o documento fiscal, de acordo
     * com as configurações dos próximos blocos de configuração por tipo de doc fiscal.
     */
    'drivers' => [
        'eduzz' => [
            'base_url' => env('EDUZZ_BASE_URL','https://api-devhub.eduzz.com'),
            'base_class' => \App\Services\Integra\Drivers\Eduzz\EduzzPlatform::class,
            'app_id' => env('EDUZZ_APP_ID', '9b9873bb-a50f-434f-8491-ef033a73a637'),
            'oauth_url' => env('EDUZZ_OAUTH_URL','https://accounts.testzz.ninja'),
            'redirect_url' => env('EDUZZ_REDIRECT_URL', config('app.url').'/eduzz/oauth-confirmation'),
            'clientToken' => env('EDUZZ_CLIENT_TOKEN', '3CDD1DFE-CC4D-4C4C-B9F3-96C59936F7B1')
        ],
    ],

];
