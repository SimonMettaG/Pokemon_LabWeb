@extends('layouts.main')

@section('content')
<br>
<div class="container text-center">
    <h1>Edit your team here!</h1>
    <h5>Be the very best.</h5>
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
                <th class="col"></th>
            </tr>
        </thead>
        <tbody>
            @for ($i = 0; $i < count($members_info); $i++)
            <tr>
                <form action="{{ route('pokemon.update', ['pokemon' => $team_members[$i]->id, 'id' => $i]) }}" method="POST" class="form-inline">
                    @csrf
                    <td class="col">{{$members_info[$i]->name}}</td>
                    <td class="col">
                        <select name="{{"pokemon".$i}}" id="{{"pokemon".$i}}" class="form-control" onChange="changeMoves({{$i}})">
                            <option value="{{$members_info[$i]->name}}">{{$members_info[$i]->name}}</option>
                            @foreach ($pokemons as $pokemon)
                            @if($pokemon != $members_info[$i]->name)
                                <option value="{{ $pokemon }}">{{ $pokemon }}</option>
                            @endif
                            @endforeach
                        </select>
                    </td class="col">
                    <td name="type1" id="{{"type1".$i}}" class="col">{{ $members_info[$i]->types[0]->type->name}}</td>
                    <td name="type2" id="{{"type2".$i}}" class="col">
                        @if (count($members_info[$i]->types)>1)
                        {{$members_info[$i]->types[1]->type->name}}
                        @else
                        null
                        @endif
                    </td>
                    <td class="col">
                        <select name="{{"move1".$i}}" id="{{"move1".$i}}" class="form-control">
                            @foreach ($members_info[$i]->moves as $move)
                                <option value="{{ $move->move->name }}">{{ $move->move->name }}</option>
                            @endforeach</select>
                    </td>
                    <td class="col">
                        <select name="{{"move2".$i}}" id="{{"move2".$i}}" class="form-control">
                            @foreach ($members_info[$i]->moves as $move)
                                <option value="{{ $move->move->name }}">{{ $move->move->name }}</option>
                            @endforeach</select>
                    </td>
                    <td class="col">
                        <select name="{{"move3".$i}}" id="{{"move3".$i}}" class="form-control">
                            @foreach ($members_info[$i]->moves as $move)
                                <option value="{{ $move->move->name }}">{{ $move->move->name }}</option>
                            @endforeach</select>
                    </td>
                    <td class="col">
                        <select name="{{"move4".$i}}" id="{{"move4".$i}}" class="form-control">
                            @foreach ($members_info[$i]->moves as $move)
                                <option value="{{ $move->move->name }}">{{ $move->move->name }}</option>
                            @endforeach</select>
                    </td>
                    <td class="col">
                        <div>
                            <input type="submit" value="Save Pokemon" class="btn btn-success">
                        </div>
                    </td>
                </form>
            </tr>
            @endfor
        </tbody>
    </table>
</div>

@endsection

@push('layout_end_body')

<script>
    function changeMoves(i) {
        let pokemon = document.getElementById("pokemon"+i).value;
        $.ajax({
            url: '{{ route('pokemon.moves') }}',
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                pokemon: pokemon
            }
        })
        .done(function(info) {
            let response = info[0];
            for (let j=1; j<5; j++){
                $('#move'+j+i).html('');
                for(move of response){
                    $('#move'+j+i).append('<option value="'+move.move.name+'">'+move.move.name+'</option>');
                }
            }
            $('#type1'+i).html(info[1]);
            $('#type2'+i).html(info[2]);

        })
        .fail(function(jqXHR, response) {
            console.log('Fallido', response);
        });
    }
</script>

@endpush