<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PokePHP\PokeApi;

class PokeapiController extends Controller
{
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
