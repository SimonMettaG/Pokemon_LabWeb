<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class SendMove implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $name;
    public $power;
    public $type;
    public $roomId;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user, $name, $power, $type, $roomId)
    {
        $this->user = $user;
        $this->name = $name;
        $this->power = $power;
        $this->type = $type;
        $this->roomId = $roomId;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('physical-special.'.$this->roomId);
    }
}
