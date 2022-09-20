<?php

namespace App\Events;

use App\Models\Webhook;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

/**
 * Evento disparado quando chega callback
 */
class WebhookCheckoutEvent implements ShouldQueue
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public array $webhook;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(array $webhook)
    {
        $this->webhook = $webhook;
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
