<?php

namespace App\Listeners;

use App\Events\CertificadoAtualizadoEvent;
use App\Services\EmpresaService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CadastraCertificadoDriverSped implements ShouldQueue
{
    use InteractsWithQueue;

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
     * @param  \App\Events\CertificadoAtualizadoEvent  $event
     * @return void
     */
    public function handle(CertificadoAtualizadoEvent $event)
    {
        $empresaService = new EmpresaService();
        $empresaService->cadastrarCertificadoSped($event->empresa, $event->certificado);
    }
}
