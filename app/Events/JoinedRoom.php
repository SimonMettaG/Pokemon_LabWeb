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
use App\Models\Team;

class JoinedRoom implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $user;
    public $team;
    public $roomId;
    public $pokemons;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user, Team $team, $roomId)
    {
        $this->user = $user;
        $this->team = $team;
        $this->roomId = $roomId;
        $this->pokemons = $team->pokemons()->paginate(6);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return 
            //new PresenceChannel('presence.'.$this->roomId),
            new PresenceChannel('join.'.$this->roomId);
    }
}
