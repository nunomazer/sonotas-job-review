<?php

namespace App\Events;

use App\Models\Certificado;
use App\Models\Empresa;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CertificadoAtualizadoEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Empresa $empresa;
    public Certificado $certificado;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Empresa $empresa, Certificado $certificado)
    {
        $this->empresa = $empresa;
        $this->certificado = $certificado;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        //return new PrivateChannel('channel-name');
    }
}
