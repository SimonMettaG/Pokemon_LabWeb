<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Message;
use App\Events\MessageSent;
use App\Events\JoinedRoom;
use App\Events\ReceivePokemon;


class FightController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function room(Team $team)
    {
        $pokemons = $team->pokemons()->paginate(6);

        return view('fight.fightroom', ['team' => $team, 'roomId' => 5, 'pokemons' => $pokemons]);
    }

    public function joinRoom(Request $request, Team $team)
    {
        $user = auth()->user();
        $pokemons = $team->pokemons()->paginate(6);
        broadcast(new JoinedRoom($user, $team, $request->input('roomId')))->toOthers();
        return view('fight.fightroom', ['team' => $team, 'roomId' => $request->input('roomId'), 'pokemons' => $pokemons]);
    }

    public function receive(Request $request)
    {
        $user = auth()->user();
        $teamJson=$request->input('team');
        $team=Team::find($teamJson['id']);
        broadcast(new ReceivePokemon($user, $team, $request->input('roomId')))->toOthers();
        return response()->json($user);
    }

    public function select(Team $team)
    {
        $pokemons = $team->pokemons()->paginate(6);
        return view('fight.fightselect', ['team' => $team, 'pokemons' => $pokemons]);
    }

    public function fetchMessages()
    {
        return Message::with('user')->get();
    }

    public function sendMessage(Request $request)
    {
        $user = auth()->user();

        $message = $user->messages()->create([
            'message' => $request->input('message')
        ]);

        broadcast(new MessageSent($user, $message, $request->input('roomId')));

        return ['status' => 'Message Sent!'];
    }
}
