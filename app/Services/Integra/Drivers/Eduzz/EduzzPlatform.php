<?php

namespace App\Services\Integra\Drivers\Eduzz;

use App\Services\Integra\PlatformSetting;

class EduzzPlatform extends PlatformSetting
{
    protected $name = 'Eduzz';
    protected array $fields = [
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
