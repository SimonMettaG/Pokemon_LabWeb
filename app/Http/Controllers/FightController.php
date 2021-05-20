<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Pokemon;
use App\Events\JoinedRoom;
use App\Events\ReceivePokemon;
use App\Events\PokemonSwap;
use App\Events\StartFight;


class FightController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function room(Team $team, $roomId)
    {
        $user = auth()->user();
        $pokemons = $team->pokemons()->paginate(6);

        return view('fight.fightroom', ['team' => $team, 'roomId' => $roomId, 'pokemons' => $pokemons]);
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
        return view('fight.fightselect', ['team' => $team, 'roomId' => mt_rand(10000000,99999999), 'pokemons' => $pokemons]);
    }

    public function changePokemon(Request $request)
    {

        $user = auth()->user();
        $res = $request->input();
        $mainPokemon = Pokemon::find($res['mainPokemonID']);
        $benchPokemon = Pokemon::find($res['benchPokemonID']);
        broadcast(new PokemonSwap($user, $mainPokemon, $benchPokemon, $res['position'], $request->input('roomId')))->toOthers();
        
        return [$res];
    }

    public function endFight(Request $request){
        $res = $request->input();
        if($res['state']==2){
            return ['success' => 'Enemy team defeated. You won!'];
        }
        elseif ($res['state']==1){
            return ['success' => 'Opponent left. You won!'];
        }
        else{
            return ['failure' => 'You lost!'];
        }
    }

    public function startFight(Request $request){
        $user = auth()->user();
        
        broadcast(new StartFight($user, $request->input('roomId')))->toOthers();
    }
}
