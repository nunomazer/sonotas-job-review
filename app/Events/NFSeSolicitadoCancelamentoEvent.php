<?php

namespace App\Events;

use App\Models\NFSe;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

/**
 * Evento disparado quando uma nova nota fiscal de serviços é criada no banco de dados, a princípio quem dispara este
 * evento é o NFSe service, pois não deveríamos ter nenhuma nota criada no banco fora da lógica do service
 */
class NFSeSolicitadoCancelamentoEvent implements ShouldQueue
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public NFSe $nfse;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(NFSe $nfse)
    {
        $this->nfse = $nfse;
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
