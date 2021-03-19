@extends('layouts.main')

@section('content')
<br>
<div class="container text-center">
    <h1>Edit your team here!</h1>
    <h5>Remember to only write the pokemon name in lower case </h5>
</div>
<br>
<div class="container" style="width: 60%">
    <div class="card border border-dark">
        <div class="card-body">
            <form action="{{ route('teams.update', ['team' => $team]) }}" method="POST" class="form-inline">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">New Team Name: </label>
                    <div class="col-sm-6">
                        <input type="text" name="name"class="form-control" value="{{ $team->name }}">
                    </div>
                    <div class="col-sm-2">
                        <input type="submit" value="Change Name" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<br>
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th class="col">Pokemon Name</th>
                <th class="col">New Pokemon Name</th>
                <th class="col">Type 1</th>
                <th class="col">Type 2</th>
                <th class="col">Move 1</th>
                <th class="col">Move 2</th>
                <th class="col">Move 3</th>
                <th class="col">Move 4</th>
                <th class="col">Item</th>
                <th class="col"></th>
            </tr>
        </thead>
        <tbody>
            @for ($i = 0; $i < count($members_info); $i++)
            <tr>
                <form action="{{ route('pokemon.update', ['pokemon' => $team_members[$i]->id]) }}" method="POST" class="form-inline">
                    @csrf
                    <td class="col">{{$members_info[$i]->name}}</td>
                    <td class="col">
                        <select name="{{"pokemon"}}" id="{{"pokemon"}}" class="form-control">
                            @foreach ($pokemons as $pokemon)
                                <option value="{{ $pokemon }}">{{ $pokemon }}</option>
                            @endforeach</select>
                    </td class="col">
                    <td name="type1" id="type1" class="col">{{ $members_info[$i]->types[0]->type->name}}</td>
                    <td name="type2" id="type2" class="col">
                        @if (count($members_info[$i]->types)>1)
                        {{$members_info[$i]->types[1]->type->name}}
                        @else
                        null
                        @endif
                    </td>
                    <td class="col">
                        <select name="{{"move1"}}" id="{{"move1" }}" class="form-control">
                            @foreach ($members_info[$i]->moves as $move)
                                <option value="{{ $move->move->name }}">{{ $move->move->name }}</option>
                            @endforeach</select>
                    </td>
                    <td class="col">
                        <select name="{{"move2"}}" id="{{"move2" }}" class="form-control">
                            @foreach ($members_info[$i]->moves as $move)
                                <option value="{{ $move->move->name }}">{{ $move->move->name }}</option>
                            @endforeach</select>
                    </td>
                    <td class="col">
                        <select name="{{"move3"}}" id="{{"move3" }}" class="form-control">
                            @foreach ($members_info[$i]->moves as $move)
                                <option value="{{ $move->move->name }}">{{ $move->move->name }}</option>
                            @endforeach</select>
                    </td>
                    <td class="col">
                        <select name="{{"move4"}}" id="{{"move4" }}" class="form-control">
                            @foreach ($members_info[$i]->moves as $move)
                                <option value="{{ $move->move->name }}">{{ $move->move->name }}</option>
                            @endforeach</select>
                    </td>
                    <td class="col">
                        Aqui va una lista de items
                    </td>
                    <td class="col">
                        <div>
                            <input type="submit" value="Guardar Equipo" class="btn btn-success">
                        </div>
                    </td>
                </form>
            </tr>
            @endfor
        </tbody>
    </table>
</div>

@endsection
