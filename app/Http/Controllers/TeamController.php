<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Team;
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
        return view('team_creation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$arr = $request->input();
        //dd($request);
        $request->user()->teams()->create([
            'name' => $request->name
        ]);
        
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

    public function pokeapi(Request $request){
        $api = new PokeApi;
        $arr = $request->input();
        $name = $arr['name'];
        $response = $api->pokemon($name);
        //return($response);
        $poke = json_decode($response);
        dd($poke ->{'name'});
        //dd($response);
    }

    public function pokeapiAll(){
        $api = new PokeApi;
        $response = $api->resourceList('pokemon', '1118', '20');
        $poke = json_decode($response);
        $names = array();
        foreach ($poke->{'results'} as $name) {
            array_push($names,$name->{'name'});
        }
        dd($names);
        return $names;
    }
}
