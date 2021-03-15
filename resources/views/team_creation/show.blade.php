@extends('layouts.main')

@section('content')
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Pokename</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $team->id }}</td>
            <td>{{ $team->name }}</td>
            @foreach ($pokemons as $pokemon)
            <td>{{$pokemon->name}}</td>
            @endforeach
        </tr>
        
    </tbody>
</table>
@endsection
