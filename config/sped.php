<?php

return [
    /**
     * Configuração de cada driver que pode ser usado pela facade Sped para emitir o documento fiscal, de acordo
     * com as configurações dos próximos blocos de configuração por tipo de doc fiscal.
     */
    'drivers' => [
        'plugnotas' => [
            'base_url' => env('PLUGNOTAS_BASE_URL','https://api.sandbox.plugnotas.com.br'),
            'token' => env('PLUGNOTAS_TOKEN', '2da392a6-79d2-4304-a8b7-959572c7e44d'), // valores padrão são do ambiente de teste
        ],
    ],

    /**
     * Configuração de cada tipo de doc fiscal que pode ser emitido pelo Sped.
     */

    /**
     * NFSe - Nota Fiscal de Serviço de Empresa, possue o driver default, mas também pode ter um drive configurado
     * por nome de cidade. O facade tomara a decisão baseada na existência de cada cidade na configuração ou  cai no fallback default.
     */
    'nfse' => [
        'default' => env('SPED_NFSE_DRIVER_DEFAULT', 'plugnotas'),
        'cidades' => [
            'nome_da_cidade' => env('SPED_NFSE_DRIVER_NOME_DA_CIDADE', 'driver'),
        ],
    ],

];
