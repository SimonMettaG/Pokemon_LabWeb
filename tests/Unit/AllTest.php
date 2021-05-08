<?php

namespace Tests\Unit;

use App\Http\Controllers\PokeapiController;
use App\Models\Team;
use App\Models\Pokemon;
use App\Models\User;
use PHPUnit\Framework\TestCase;

class AllTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    /** @test */
    public function createUser()
    {
        $name = "aaa";
        $email = "aaa@gmail.com";
        $password = "aaa";
        $user = new User();
        $user->name = "aaa";
        $user->email = "aaa@gmail.com";
        $user->password = "aaa";
        $this->assertTrue($user->name == $name && $user->email == $email && $user->password == $password);
    }

    /** @test */
    public function searchPokemonType(){
        $api = new PokeapiController;
        $prueba = $api->pokeapi("charizard");
        $this->assertTrue($prueba->types[0]->type->name == "fire");
    }

    /** @test */
    public function createPokemon(){
        $api = new PokeapiController;

        $pokemon1 = new Pokemon();
        $pokemon1->name = "venusaur";
        $pokemon1->type1 = "grass";
        $pokemon1->type2 = "poison";
        $pokemon1->move1 = "swords-dance";
        $pokemon1->move2 = "cut";
        $pokemon1->move3 = "bind";
        $pokemon1->move4 = "vine-whip";
        $pokemon1->image = "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/3.png";

        $prueba = $api->pokeapi("venusaur");
        
        $this->assertTrue($prueba->types[0]->type->name == $pokemon1->type1 && $prueba->types[1]->type->name == $pokemon1->type2 && $prueba->name == $pokemon1->name);
    }

    /** @test */
    public function createTeam(){
        $name = "CR7";
        $team1 = new Team();
        $team1->name = "CR7";
            
        $this->assertTrue($team1->name == $name);
    }
}
