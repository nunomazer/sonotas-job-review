<?php

namespace App\Events;

use App\Models\NFSe;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NFSeCriadaEvent
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
