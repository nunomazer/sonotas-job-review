<?php

namespace App\Listeners;

use App\Events\EmpresaAlteradaEvent;
use App\Services\EmpresaService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AlteraEmpresaDriverSped implements ShouldQueue
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
     * @param  \App\Events\EmpresaAlteradaEvent  $event
     * @return void
     */
    public function handle(EmpresaAlteradaEvent $event)
    {
        $empresaService = new EmpresaService();
        $empresaService->alterarSped($event->empresa);
    }
}
