<?php

namespace App\Providers;

use App\Events\EmpresaAlteradaEvent;
use App\Events\EmpresaCriadaEvent;
use App\Listeners\AlteraEmpresaDriverSped;
use App\Listeners\CadastraEmpresaDriverSped;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        EmpresaCriadaEvent::class => [
            CadastraEmpresaDriverSped::class,
        ],

        EmpresaAlteradaEvent::class => [
            AlteraEmpresaDriverSped::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
