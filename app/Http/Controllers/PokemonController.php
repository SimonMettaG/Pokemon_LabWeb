<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;

use Illuminate\Http\Request;

class PokemonController extends Controller
{
    public function update(Request $request, Pokemon $pokemon)
    {
        $arr = $request->input();
        $pokemon->name = $arr['name'];
        $pokemon->type1 = $arr['type1'];
        $pokemon->type2 = $arr['type2'];
        $pokemon->move1 = $arr['move1'];
        $pokemon->move2 = $arr['move2'];
        $pokemon->move3 = $arr['move3'];
        $pokemon->move4 = $arr['move4'];
        $pokemon->item = $arr['item'];
        $pokemon->save();
        return back();
    }
}
