@extends('layouts.main')

@section('content')
<h1>Edit your team here!</h1>
<h5>Remember to only write the pokemon name in lower case </h5>
<form action="{{ route('teams.update', ['team' => $team]) }}" method="POST">
    @csrf
    @method('PUT')
    
    <div>
        <label for="">Name</label>
        <input type="text" name="name" value="{{ $team->name }}">
    </div>
    <div>
        <input type="submit" value="Store">
    </div>
</form>

    <div>
    <form action="{{ route('teams.store') }}" method="POST">
       @csrf
        <table>
            <thead>
                <th>Pokemon Name</th>
                <th>New Pokemon Name</th>
                <th>New Pokemon Name</th>
                <th>New Pokemon Name</th>
                <th>New Pokemon Name</th>
                <th>New Pokemon Name</th>
            </thead>
            <tbody>
                @for ($i = 1; $i < sizeof($team_members)+ 1; $i++)
                <tr>
                    <td>{{ $team_members[$i-1]->name }}</td>
                    <td>
                            <select name="{{"pokemon" . strval($i)}}" id="{{"pokemon" . strval($i)}}">
                            @foreach ($pokemons as $pokemon)
                                <option value="{{ $pokemon }}">{{ $pokemon }}</option>
                            @endforeach</select>
                    </td>
                </tr>   
                @endfor
            </tbody>
        </table>
        <div>
            <input type="submit" value="Guardar Equipo">
        </div>
    </form>
    </div>
    
@endsection
