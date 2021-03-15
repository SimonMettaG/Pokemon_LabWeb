<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;

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
    return view('welcome');
});

Route::get('/pokemon', function () {
    return view('layouts/main');
});


Route::resource('teams', 'TeamController');

Route::get('pokeapi/{pokemon}', 'PokeapiController@pokeapi')->name('pokeapi.get');
Route::get('pokeapi', 'PokeapiController@pokeapiAll')->name('pokeapi.getAll');

Route::get('register', 'AuthController@register');
Route::post('register', 'AuthController@doRegister')
    ->name('auth.do-register');
Route::get('login', 'AuthController@login')
    ->name('auth.login');
Route::post('login', 'AuthController@doLogin')
    ->name('auth.do-login');
Route::any('logout', 'AuthController@logout')->name('auth.logout');
