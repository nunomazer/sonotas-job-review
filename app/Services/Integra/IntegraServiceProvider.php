<?php

namespace App\Services\Integra;

use App\Services\Integra\Drivers\Eduzz\EduzzPlatform;
use Illuminate\Support\ServiceProvider;

class IntegraServiceProvider extends ServiceProvider
{
    protected $platforms = [
        EduzzPlatform::class,
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    }

    public function boot()
    {

    }

}
