<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Message;
use App\Events\MessageSent;


class FightController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function room(Team $team)
    {
        //dd($team);
        $team = [$team];
        return view('fight.fightroom', ['team' => $team]);
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

        broadcast(new MessageSent($user, $message));

        return ['status' => 'Message Sent!'];
    }
}
