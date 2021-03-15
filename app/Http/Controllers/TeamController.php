<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Team;
use App\Models\Pokemon;
use Illuminate\Support\Facades\Auth;
use PokePHP\PokeApi;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::all();
        return view('team_creation.index', ['teams' => $teams]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $api = new PokeApi;
        $response = $api->resourceList('pokemon', '1118', '0');
        $poke = json_decode($response);
        $names = array();
        foreach ($poke->{'results'} as $name) {
            array_push($names,$name->{'name'});
            
            # array_push($ids,$name->{'id'});
            #array_push($type1,$name->{'types[0].type.name'});
            #array_push($type2,$name->{'types[1].type.name'});
            #array_push($move,$name->{'moves'});    

           # $response2 = $api->pokemon($name->{'name'});
            #$poke2 = json_decode($response2);
            #$ids = array();
            #$type1 = array();
            #$type2 = array();
            #$move = array();
            #dd($poke2);
        }
        
        return view('team_creation.create', ["pokemons" => $names, ]);
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
        $team = new Team();
        if($arr["name"] == null) {
            $arr["name"] = "";
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

        array_push($pokemonArray,$pokemon1);
        array_push($pokemonArray,$pokemon2);
        array_push($pokemonArray,$pokemon3);
        array_push($pokemonArray,$pokemon4);
        array_push($pokemonArray,$pokemon5);
        array_push($pokemonArray,$pokemon6);
        #$pokemon1->name = "Pepe";
        #$pokemon1->type1 = "Pepe";
        #$pokemon1->type2 = "Pepe";
        #$pokemon1->move1 = "Pepe";
        #$pokemon1->move2 = "Pepe";
        #$pokemon1->move4 = "Pepe";
        #$pokemon1->move3 = "Pepe";
        #$pokemon1->item = "Pepe";
        #$pokemon1->team_id = $team->id;
        #$pokemon1->save();
        
        foreach ($pokemonArray as $pokemon) {
            $team->pokemons()->create([
            
                'name' => $pokemon,
                'type1' => " ",
                'type2' => " ",
                'move1' => " ",
                'move2' => " ",
                'move3' => " ",
                'move4' => " ",
                'item' => " ",
            
            ],);
        }
                
        #dd($pokemonArray);
        $pokemons = Pokemon::where("team_id", $team->id)->get();
        #return redirect()->route('teams.index')
        return view('team_creation.show', ['team' => $team, 'pokemons' => $pokemons]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        #$pokemons = Pokemon::where("team_id", $team->id)->get();
        $pokemons = $team->pokemons()->paginate(6);
        #dd($kk);
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
        return view('team_creation.edit', ['team' => $team]);
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
        return redirect()->route('teams.index');
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
