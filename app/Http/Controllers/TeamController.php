<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Team;
use App\Models\Pokemon;
use App\Http\Controllers\PokeapiController;
use Illuminate\Support\Facades\Auth;
use PokePHP\PokeApi;
use Illuminate\Support\Str;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = auth()->user()->teams()->paginate();
        return view('team_creation.index', ['teams' => $teams,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pokemons = app('App\\Http\Controllers\PokeapiController')->pokeapiAll();
       
        return view('team_creation.create', ["pokemons" => $pokemons]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $arr = $request->input();
        $team= new Team();
        if($arr["name"] == null) {
            $arr["name"] = "DEFAULT";
        }
        
        $userid = Auth::id();
        
        $team->name = $arr["name"];
        $team->user_id = $userid;
        $team->save();
        $pokemonArray = array();
        
        $pokemon1 = $arr["pokemon1"];
        $pokemon2 = $arr["pokemon2"];
        $pokemon3 = $arr["pokemon3"];
        $pokemon4 = $arr["pokemon4"];
        $pokemon5 = $arr["pokemon5"];
        $pokemon6 = $arr["pokemon6"];

        array_push($pokemonArray, $pokemon1);
        array_push($pokemonArray, $pokemon2);
        array_push($pokemonArray, $pokemon3);
        array_push($pokemonArray, $pokemon4);
        array_push($pokemonArray, $pokemon5);
        array_push($pokemonArray, $pokemon6);
        
        foreach ($pokemonArray as $pokemon) {
            $info = app('App\\Http\Controllers\PokeapiController')->pokeapi(Str::lower($pokemon));
            
            if (count($info->types)>1) {
                $type2 = Str::title($info->types[1]->type->name);
            }
            else {
                $type2 = "Null";
            }

            $hp_stat = $info->stats[0]->base_stat;

            $hp = ((2*$hp_stat*50)/100)+60;

            if(count($info->moves)==0){
                $team->pokemons()->create([
            
                    'name' => $pokemon,
                    'type1' => Str::title($info->types[0]->type->name),
                    'type2' => $type2,
                    'move1' => 'No attack',
                    'move2' => 'No attack',
                    'move3' => 'No attack',
                    'move4' => 'No attack',
                    'image' => $info->sprites->front_default,
                    'hp' => $hp
                ],);
            }
            else if(count($info->moves)<4){
                $team->pokemons()->create([
            
                    'name' => $pokemon,
                    'type1' => Str::title($info->types[0]->type->name),
                    'type2' => $type2,
                    'move1' => Str::title($info->moves[0]->move->name),
                    'move2' => Str::title($info->moves[0]->move->name),
                    'move3' => Str::title($info->moves[0]->move->name),
                    'move4' => Str::title($info->moves[0]->move->name),
                    'image' => $info->sprites->front_default,
                    'hp' => $hp
                ],);
            }
            else{
                $team->pokemons()->create([
            
                    'name' => $pokemon,
                    'type1' => Str::title($info->types[0]->type->name),
                    'type2' => $type2,
                    'move1' => Str::title($info->moves[0]->move->name),
                    'move2' => Str::title($info->moves[1]->move->name),
                    'move3' => Str::title($info->moves[2]->move->name),
                    'move4' => Str::title($info->moves[3]->move->name),
                    'image' => $info->sprites->front_default,
                    'hp' => $hp
                ],);
            } 
        }
       /*

        $pokemons = app('App\\Http\Controllers\PokeapiController')->pokeapiAll();

    
        
        $team_members = Pokemon::where("team_id", $team->id)->get();
        $members_info = array();
        foreach ($team_members as $member) {
            $info = app('App\\Http\Controllers\PokeapiController')->pokeapi($member->name);
            array_push($members_info, $info);
            
        }
        */
        //return view('team_creation.edit', ['team' => $team, 'team_members' => $team_members, 'pokemons' => $pokemons, 'members_info' => $members_info]);
        $teams = auth()->user()->teams()->paginate();
        return view('team_creation.index', ['teams' => $teams,]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        $pokemons = $team->pokemons()->paginate(6);
        return view('team_creation.show', ['team' => $team, 'pokemons' => $pokemons]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        $pokemons = app('App\\Http\Controllers\PokeapiController')->pokeapiAll();
        $team_members = Pokemon::where("team_id", $team->id)->get();
        $members_info = array();
        foreach ($team_members as $member) {
            $info = app('App\\Http\Controllers\PokeapiController')->pokeapi(Str::lower($member->name));
            array_push($members_info, $info);
            
        }
        return view('team_creation.edit', ['team' => $team, 'team_members' => $team_members, 'pokemons' => $pokemons, 'members_info' => $members_info]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        $arr = $request->input();
        $team->name = $arr['name'];
        $team->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        $team->delete();
        return redirect()->route('teams.index');
    }
}
