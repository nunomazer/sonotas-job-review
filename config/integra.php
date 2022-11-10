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
        ],
    ],

];
