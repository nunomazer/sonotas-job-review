<?php

namespace App\Events;

use App\Models\NFSe;
use App\Models\Venda;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

/**
 * Evento disparado quando uma venda no banco de dados
 */
class VendaAtualizadaEvent implements ShouldQueue
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Venda $venda;

    /**
     * Create a new event instance.
     * @param Venda $venda
     * @return void
     */
    public function __construct(Venda $venda)
    {
        $this->venda = $venda;
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
