<?php

namespace Tests\Unit;

use App\Http\Controllers\PokeapiController;
use App\Models\Team;
use App\Models\Pokemon;
use App\Models\User;
use PHPUnit\Framework\TestCase;

class LogInTest extends TestCase
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
    /*
    public function wow(){

        $pokemon1 = new Pokemon();
        $pokemon1->name = "aaa";
        $pokemon1->type1 = "aaa";
        $pokemon1->type2 = "aaa";
        $pokemon1->move1 = "aaa";
        $pokemon1->move2 = "aaa";
        $pokemon1->move3 = "aaa";
        $pokemon1->move4 = "aaa";
        $pokemon1->image = "aaa";

        $pokemon2 = new Pokemon();
        $pokemon2->name = "aaa";
        $pokemon2->type1 = "aaa";
        $pokemon2->type2 = "aaa";
        $pokemon2->move1 = "aaa";
        $pokemon2->move2 = "aaa";
        $pokemon2->move3 = "aaa";
        $pokemon2->move4 = "aaa";
        $pokemon2->image = "aaa";

        $pokemon3 = new Pokemon();
        $pokemon3->name = "aaa";
        $pokemon3->type1 = "aaa";
        $pokemon3->type2 = "aaa";
        $pokemon3->move1 = "aaa";
        $pokemon3->move2 = "aaa";
        $pokemon3->move3 = "aaa";
        $pokemon3->move4 = "aaa";
        $pokemon3->image = "aaa";

        $pokemon4 = new Pokemon();
        $pokemon4->name = "aaa";
        $pokemon4->type1 = "aaa";
        $pokemon4->type2 = "aaa";
        $pokemon4->move1 = "aaa";
        $pokemon4->move2 = "aaa";
        $pokemon4->move3 = "aaa";
        $pokemon4->move4 = "aaa";
        $pokemon4->image = "aaa";

        $pokemon5 = new Pokemon();
        $pokemon5->name = "aaa";
        $pokemon5->type1 = "aaa";
        $pokemon5->type2 = "aaa";
        $pokemon5->move1 = "aaa";
        $pokemon5->move2 = "aaa";
        $pokemon5->move3 = "aaa";
        $pokemon5->move4 = "aaa";
        $pokemon5->image = "aaa";

        $pokemon6 = new Pokemon();
        $pokemon6->name = "aaa";
        $pokemon6->type1 = "aaa";
        $pokemon6->type2 = "aaa";
        $pokemon6->move1 = "aaa";
        $pokemon6->move2 = "aaa";
        $pokemon6->move3 = "aaa";
        $pokemon6->move4 = "aaa";
        $pokemon6->image = "aaa";
        
        $team = new Team();
        $team->name ="aaa";
    }
    */
}
