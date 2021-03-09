@extends('layouts.main')

@section('content')
<h1>Create your team here!</h1>
<form action="{{ route('teams.store') }}" method="POST">
    @csrf
    <div>
        <label for="">Name</label>
        <input type="text" name="name">
    </div>
    <div>
        <input type="submit" value="Store">
    </div>
</form>

<h2> Agrega tus pokemons </h2>
<form action="{{ route('pokeapi.get') }}" method="GET">
    @csrf
    <div>
        <label for="">Name</label>
        <input type="text" name="name">
    </div>
    <div>
        <input type="submit" value="Pokeapi">
    </div>
</form>

<form action="{{ route('pokeapi.getAll') }}" method="GET">
    @csrf
    <div>
        <input type="submit" value="PokeapiAll">
    </div>
</form>
@endsection
