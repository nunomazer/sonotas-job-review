<?php

namespace App\Listeners;

use App\Events\NFSeSolicitadoCancelamentoEvent;
use App\Services\NFSeService;
use Illuminate\Contracts\Queue\ShouldQueue;

class CancelarNFSeDriverSped implements ShouldQueue
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
     * @param  \App\Events\NFSeSolicitadoCancelamentoEvent  $event
     * @return void
     */
    public function handle(NFSeSolicitadoCancelamentoEvent $event)
    {
        $nfseService = new NFSeService();
        $nfseService->cancelarSped($event->nfse);
    }
}
