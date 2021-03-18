<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;

use Illuminate\Http\Request;

class PokemonController extends Controller
{
    public function update(Request $request, Pokemon $pokemon)
    {
        $arr = $request->input();
        $info = app('App\\Http\Controllers\PokeapiController')->pokeapi($pokemon->name);
        $type1 = $info->types[0]->type->name;

        if (count($info->types)>1) {
            $type2 = $info->types[1]->type->name;
        }
        else {
            $type2 = "null";
        }
        $pokemon->name = $arr['pokemon'];
        $pokemon->type1 =  $type1;
        $pokemon->type2 = $type2;
        $pokemon->move1 = $arr['move1'];
        $pokemon->move2 = $arr['move2'];
        $pokemon->move3 = $arr['move3'];
        $pokemon->move4 = $arr['move4'];
        #$pokemon->item = $arr['item'];
        $pokemon->save();
        return back();
    }
}
