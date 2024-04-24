<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class QuitGame implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $address;

    public function __construct($address)
    {
        $this->address = $address;
    }

    public function broadcastOn()
    {
        return ['quit.' . $this->address];
    }

    public function broadcastWith()
    {
        // Additional data you want to send with the event
        return [
            'message' => $this->address,
        ];
    }
}
