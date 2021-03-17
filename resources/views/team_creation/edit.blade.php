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
        <table>
            <thead>
                <th>Pokemon Name</th>
                <th>New Pokemon Name</th>
                <th>Type 1</th>
                <th>Type 2</th>
                <th>Move 1</th>
                <th>Move 2</th>
                <th>Move 3</th>
                <th>Move 4</th>
                <th>Item</th>
            </thead>
            <tbody>
                @for ($i = 0; $i < count($members_info); $i++)
                <tr>
                    <form action="{{ route('pokemon.update', ['pokemon' => $team_members[$i]->id]) }}" method="POST">
                       @csrf
                    <td>{{$members_info[$i]->name}}</td>
                    <td>
                        <select name="{{"pokemon"}}" id="{{"pokemon"}}">
                            @foreach ($pokemons as $pokemon)
                                <option value="{{ $pokemon }}">{{ $pokemon }}</option>
                            @endforeach</select>
                    </td>
                    <td>{{ $members_info[$i]->types[0]->type->name}}</td>
                    <td>
                        @if (count($members_info[$i]->types)>1)
                        {{$members_info[$i]->types[1]->type->name}}
                        @else
                        null
                        @endif
                    </td>
                    <td>
                        <select name="{{"move1"}}" id="{{"move1" }}">
                            @foreach ($members_info[$i]->moves as $move)
                                <option value="{{ $move->move->name }}">{{ $move->move->name }}</option>
                            @endforeach</select>
                    </td>
                    <td>
                        <select name="{{"move2"}}" id="{{"move2" }}">
                            @foreach ($members_info[$i]->moves as $move)
                                <option value="{{ $move->move->name }}">{{ $move->move->name }}</option>
                            @endforeach</select>
                    </td>
                    <td>
                        <select name="{{"move3"}}" id="{{"move3" }}">
                            @foreach ($members_info[$i]->moves as $move)
                                <option value="{{ $move->move->name }}">{{ $move->move->name }}</option>
                            @endforeach</select>
                    </td>
                    <td>
                        <select name="{{"move4"}}" id="{{"move4" }}">
                            @foreach ($members_info[$i]->moves as $move)
                                <option value="{{ $move->move->name }}">{{ $move->move->name }}</option>
                            @endforeach</select>
                    </td>
                    <td>
                       Aqui va una lista de items
                    </td>
                    <td>    
                        <div>
                            <input type="submit" value="Guardar Equipo">
                        </div>
                    </form>
                </td>
                </tr>   
                @endfor
            </tbody>
        </table>
    </div>
    
@endsection
