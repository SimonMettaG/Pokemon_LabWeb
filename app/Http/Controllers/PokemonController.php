<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;

use Illuminate\Http\Request;

class PokemonController extends Controller
{
    public function update(Request $request, Pokemon $pokemon, $id)
    {
        $arr = $request->input();
        $pokemon->name = $arr['pokemon'.$id];
        $info = app('App\\Http\Controllers\PokeapiController')->pokeapi($pokemon->name);
        $type1 = $info->types[0]->type->name;
        if (count($info->types)>1) {
            $type2 = $info->types[1]->type->name;
        }
        else {
            $type2 = "null";
        }
        $pokemon->type1 =  $type1;
        $pokemon->type2 = $type2;
        $pokemon->move1 = $arr['move1'.$id];
        $pokemon->move2 = $arr['move2'.$id];
        $pokemon->move3 = $arr['move3'.$id];
        $pokemon->move4 = $arr['move4'.$id];
        $pokemon->image = $info->sprites->front_default;
        $pokemon->save();
        return back();
    }

    public function moves(Request $request)
    {
        $arr = $request->input();
        $pokemon = $arr['pokemon'];
        $info = app('App\\Http\Controllers\PokeapiController')->pokeapi($pokemon);

        $type1 = $info->types[0]->type->name;
        if (count($info->types)>1) {
            $type2 = $info->types[1]->type->name;
        }
        else {
            $type2 = "null";
        }

        return [$info->moves, $type1, $type2];
    }
}
