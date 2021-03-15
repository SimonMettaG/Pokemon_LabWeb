@extends('layouts.main')

@section('content')
<h1>Create your team here!</h1>
<form action="{{ route('teams.store') }}" method="POST">
    @csrf
    <div>
        <label for="">Nombre de Equipo:</label>
        <input type="text" name="name" id="name">
        <br>
        <select name="pokemon1" id="pokemon1">
            @foreach ($pokemons as $pokemon)
                <option value="{{ $pokemon }}">{{ $pokemon }}</option>
            @endforeach
        </select>
        <br>
        <select name="pokemon2" id="pokemon2">
            @foreach ($pokemons as $pokemon)
                <option value="{{ $pokemon }}">{{ $pokemon }}</option>
            @endforeach
        </select>
        <br>
        <select name="pokemon3" id="pokemon3">
            @foreach ($pokemons as $pokemon)
                <option value="{{ $pokemon }}">{{ $pokemon }}</option>
            @endforeach
        </select>
        <br>
        <select name="pokemon4" id="pokemon4">
            @foreach ($pokemons as $pokemon)
                <option value="{{ $pokemon }}">{{ $pokemon }}</option>
            @endforeach
        </select>
        <br>
        <select name="pokemon5" id="pokemon5">
            @foreach ($pokemons as $pokemon)
                <option value="{{ $pokemon }}">{{ $pokemon }}</option>
            @endforeach
        </select>
        <br>
        <select name="pokemon6" id="pokemon6">
            @foreach ($pokemons as $pokemon)
                <option value="{{ $pokemon }}">{{ $pokemon }}</option>
            @endforeach
        </select>
    </div>
    
    <br>
    <div>
        <input type="submit" value="Guardar Equipo">
    </div>
</form>

<form action="{{ route('pokeapi.getOne') }}" method="GET">
    @csrf
    <div>
        <label for="">Name</label>
        <input type="text" name="name">
    </div>
    <div>
        <input type="submit" value="Pokeapi">
    </div>
</form>