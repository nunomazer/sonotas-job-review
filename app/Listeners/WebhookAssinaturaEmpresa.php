<?php

namespace App\Listeners;

use App\Events\WebhookCheckoutEvent;
use App\Services\EmpresaService;
use App\Services\NFSeService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class WebhookAssinaturaEmpresa implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\WebhookCheckoutEvent  $event
     * @return void
     */
    public function handle(WebhookCheckoutEvent $event)
    {
        $service = new EmpresaService();
        $service->checarWebhook($event->webhook);
    }
}
