<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PokePHP\PokeApi;

class PokeapiController extends Controller
{
    public function pokeapi($string){
        $api = new PokeApi;
        $response = $api->pokemon($string);
        $poke = json_decode($response);
        return $poke;
    }

    public function pokeapiAll(){
        $api = new PokeApi;
        $response = $api->resourceList('pokemon', '1118', '0');
        $poke = json_decode($response);
        $names = array();
        foreach ($poke->{'results'} as $name) {
            array_push($names,$name->{'name'});
        }
        return $names;
    }
}
