<?php

namespace App\Services\Integra\Drivers\Eduzz;

use App\Services\Integra\IIntegraDriver;
use App\Services\Integra\Platform;

class EduzzPlatform extends Platform implements IIntegraDriver
{
    public static $name = 'Eduzz';

    public static array $fields = [
        [
            'name' => 'public_key',
            'label' => 'Public Key',
            'required' => true,
        ],
        [
            'name' => 'api_key',
            'label' => 'Api Key',
            'required' => true,
        ],
        [
            'name' => 'email',
            'label' => 'E-mail',
            'required' => false,
        ],
    ];
}
