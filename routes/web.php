<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Events\StartFight;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    #return view('welcome');
    return view('/auth.login');
});

Route::get('/welcome', function () {
    return view('welcome');
    #return view('/auth.login');
});

Route::get('/pokemon', function () {
    return view('layouts/main');
});

Route::get('/test', function () {
    StartFight::dispatch('Someone');
    return "Event has been sent";
});


Route::resource('teams', 'TeamController')
                                    ->middleware('logged');

Route::get('pokeapi/{pokemon}', 'PokeapiController@pokeapi')
                                    ->middleware('logged')
                                    ->name('pokeapi.get');
Route::get('pokeapi', 'PokeapiController@pokeapiAll')
                                    ->middleware('logged')
                                    ->name('pokeapi.getAll');
Route::get('pokeapi2', 'PokeapiController@pokeapi')
                                    ->middleware('logged')
                                    ->name('pokeapi.getOne');

Route::post('pokemonUpdate/{pokemon}', 'PokemonController@update')
                                    ->middleware('logged')
                                    ->name('pokemon.update');

Route::get('fightselect/{team}', 'FightController@select')
    ->name('fight.fightselect');

Route::get('fightroom/{team}', 'FightController@room')
    ->name('fight.fightroom');

Route::get('fightjoin/{team}', 'FightController@joinRoom')
    ->name('fight.fightjoin');

Route::get('fightMessage', 'FightController@fetchMessages')->name('fight.fightMessage');
Route::post('fightMessage', 'FightController@sendMessage')->name('fight.postFightMessage');

Route::post('fightReceive', 'FightController@receive')->name('fight.receive');

Route::get('register', 'AuthController@register')->name('auth.register');
Route::post('register', 'AuthController@doRegister')
    ->name('auth.do-register');
Route::get('login', 'AuthController@login')
    ->name('auth.login');
Route::post('login', 'AuthController@doLogin')
    ->name('auth.do-login');
Route::any('logout', 'AuthController@logout')->name('auth.logout');
