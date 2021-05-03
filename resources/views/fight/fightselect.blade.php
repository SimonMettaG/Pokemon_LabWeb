@extends('layouts.main')

@section('content')
<br>
<div class="container text-center">
    <a href="{{ route('fight.fightroom', ['team' => $team]) }}" class="btn btn-success">Create room</a>
    <form action="{{ route('fight.fightjoin', ['team' => $team]) }}" class="form-inline">

        <div class="form-group row">
            <label class="col-sm-3 col-form-label">New Team Name: </label>
            <div class="col-sm-6">
                <input type="text" name="roomId"class="form-control" value="">
            </div>
            <div class="col-sm-2">
                <input type="submit" value="Join Room" class="btn btn-primary">
            </div>
        </div>
    </form>
</div>
<br>
<div class="container text-center">
    @auth
        <h3><strong>Team ID: </strong>{{ $team->id }}</h3>
        <h3><strong>Team Name: </strong>{{ $team->name }}</h3>
    @endauth
</div>
<br>
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th class="col">Pokemon 1</th>
                <th class="col">Type1</th>
                <th class="col">Type2</th>
                <th class="col">Move1</th>
                <th class="col">Move2</th>
                <th class="col">Move3</th>
                <th class="col">Move4</th>
                <th class="col">Item</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pokemons as $pokemon)
            <tr>
                <td class="col">{{$pokemon->name}}</td>
                <td class="col">{{$pokemon->type1}}</td>
                <td class="col">{{$pokemon->type2}}</td>
                <td class="col">{{$pokemon->move1}}</td>
                <td class="col">{{$pokemon->move2}}</td>
                <td class="col">{{$pokemon->move3}}</td>
                <td class="col">{{$pokemon->move4}}</td>
                <td class="col">{{$pokemon->item}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection