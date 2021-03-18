@extends('layouts.main')

@section('content')
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <td>{{ $team->id }}</td>
        <td>{{ $team->name }}</td>
        </tr>
    </tbody>
</table>
<br>
<table>
    <thead>
        <tr>
            <th>Pokemon 1</th>
            <th>Type1</th>
            <th>Type2</th>
            <th>Move1</th>
            <th>Move2</th>
            <th>Move3</th>
            <th>Move4</th>
            <th>Item</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pokemons as $pokemon)
        <tr>
            <td>{{$pokemon->name}}</td>
            <td>{{$pokemon->type1}}</td>
            <td>{{$pokemon->type2}}</td>
            <td>{{$pokemon->move1}}</td>
            <td>{{$pokemon->move2}}</td>
            <td>{{$pokemon->move3}}</td>
            <td>{{$pokemon->move4}}</td>
            <td>{{$pokemon->item}}</td>
        </tr>   
        @endforeach
    </tbody>
</table>
@endsection
