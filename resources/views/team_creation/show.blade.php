@extends('layouts.main')

@section('content')
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
