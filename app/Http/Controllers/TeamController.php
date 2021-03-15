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
        }

        return view('team_creation.create', ["pokemons" => $names]);
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

        $pokemon1 = new Pokemon();


        $pokemon1 = $arr["pokemon1"];
        $pokemon2 = $arr["pokemon2"];
        $pokemon3 = $arr["pokemon3"];
        $pokemon4 = $arr["pokemon4"];
        $pokemon5 = $arr["pokemon5"];
        $pokemon6 = $arr["pokemon6"];

        if($team_name == null) {
            $team_name = "";
        }

        return redirect()->route('teams.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        return view('team_creation.show', ['team' => $team]);
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
