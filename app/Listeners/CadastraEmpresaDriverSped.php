<?php

namespace App\Listeners;

use App\Events\EmpresaCriadaEvent;
use App\Services\EmpresaService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CadastraEmpresaDriverSped implements ShouldQueue
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
     * @param  \App\Events\EmpresaCriadaEvent  $event
     * @return void
     */
    public function handle(EmpresaCriadaEvent $event)
    {
        $empresaService = new EmpresaService();
        $empresaService->cadastrarSped($event->empresa);
    }
}
