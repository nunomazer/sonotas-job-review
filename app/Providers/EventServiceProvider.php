<?php

namespace App\Providers;

use App\Events\ClienteAlteradoEvent;
use App\Events\ClienteCriadoEvent;
use App\Events\EmpresaAlteradaEvent;
use App\Events\EmpresaCriadaEvent;
use App\Events\NFSeDownloadedFilesEvent;
use App\Events\WebhookCheckoutEvent;
use App\Events\NFSeCriadaEvent;
use App\Events\VendaCriadaEvent;
use App\Listeners\AlteraEmpresaDriverSped;
use App\Listeners\CadastraEmpresaDriverSped;
use App\Listeners\EmiteNFSeDriverSped;
use App\Listeners\WebhookAssinaturaEmpresa;
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

        ClienteCriadoEvent::class => [
        ],

        ClienteAlteradoEvent::class => [
        ],
        /*
        WebhookCheckoutEvent::class => [
            WebhookAssinaturaEmpresa::class
        ],*/

        EmpresaCriadaEvent::class => [
            CadastraEmpresaDriverSped::class,
        ],

        EmpresaAlteradaEvent::class => [
            AlteraEmpresaDriverSped::class,
        ],

        VendaCriadaEvent::class => [
        ],

        NFSeCriadaEvent::class => [
            EmiteNFSeDriverSped::class,
        ],

        NFSeDownloadedFilesEvent::class => [

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
