<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ConnectGame
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $address;
    public function __construct($address)
    {
        $this->address = $address;
    }

    public function broadcastOn()
    {
        return ['connect.' . $this->address];
    }

    public function broadcastWith()
    {
        // Additional data you want to send with the event
        return [
            'message' => 'connected',
        ];
    }
}
