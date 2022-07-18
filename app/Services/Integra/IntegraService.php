<?php

namespace App\Services\Integra;

use App\Services\Integra\Drivers\Eduzz\EduzzPlatform;

class IntegraService
{
    protected $platforms = [
        EduzzPlatform::class,
    ];

    public function platforms() : array
    {
        return $this->platforms;
    }
}
