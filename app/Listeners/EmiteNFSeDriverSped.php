<?php

namespace App\Listeners;

use App\Events\NFSeCriadaEvent;
use App\Services\NFSeService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class EmiteNFSeDriverSped implements ShouldQueue
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
     * @param  \App\Events\NFSeCriadaEvent  $event
     * @return void
     */
    public function handle(NFSeCriadaEvent $event)
    {
        $nfseService = new NFSeService();
        $nfseService->emitirSped($event->nfse);
    }
}
