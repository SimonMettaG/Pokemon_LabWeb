@extends('layouts.main')

@section('content')
<br>
<div class="container text-center">
    <h1>Create your team here!</h1>
</div>
<br>
<div class="container" style="width: 50%">
    <div class="card border border-dark">
        <div class="card-body">
            <form action="{{ route('teams.store') }}" method="POST" class="form-inline">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Team Name: </label>
                    <div class="col-sm-10">
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                </div>
                <br>
                <br>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Pokémon 1: </label>
                    <div class="col-sm-10">
                        <select class="form-control" name="pokemon1" id="pokemon1">
                            @foreach ($pokemons as $pokemon)
                                <option value="{{ Str::title($pokemon) }}">{{ Str::title($pokemon) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Pokémon 2: </label>
                    <div class="col-sm-10">
                        <select class="form-control" name="pokemon2" id="pokemon2">
                            @foreach ($pokemons as $pokemon)
                                <option value="{{ Str::title($pokemon) }}">{{Str::title( $pokemon) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Pokémon 3: </label>
                    <div class="col-sm-10">
                        <select class="form-control" name="pokemon3" id="pokemon3">
                            @foreach ($pokemons as $pokemon)
                                <option value="{{ Str::title($pokemon) }}">{{ Str::title($pokemon) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Pokémon 4: </label>
                    <div class="col-sm-10">
                        <select class="form-control" name="pokemon4" id="pokemon4">
                            @foreach ($pokemons as $pokemon)
                                <option value="{{ Str::title($pokemon) }}">{{ Str::title($pokemon) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Pokémon 5: </label>
                    <div class="col-sm-10">
                        <select class="form-control" name="pokemon5" id="pokemon5">
                            @foreach ($pokemons as $pokemon)
                                <option value="{{ Str::title($pokemon) }}">{{ Str::title($pokemon) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Pokémon 6: </label>
                    <div class="col-sm-10">
                        <select class="form-control" name="pokemon6" id="pokemon6">
                            @foreach ($pokemons as $pokemon)
                                <option value="{{ Str::title($pokemon) }}">{{ Str::title($pokemon) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <div class="text-center">
                    <input type="submit" value="Create Team" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
