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
use App\Models\Pokemon;

class PokemonSwap implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $mainPokemonID;
    public $benchPokemonID;
    public $position;
    public $roomId;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user, Pokemon $mainPokemonID, Pokemon $benchPokemonID, $position, $roomId)
    {
        $this->user = $user;
        $this->mainPokemonID = $mainPokemonID;
        $this->benchPokemonID = $benchPokemonID;
        $this->position = $position;
        $this->roomId = $roomId;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('swap.'.$this->roomId);
    }
}
