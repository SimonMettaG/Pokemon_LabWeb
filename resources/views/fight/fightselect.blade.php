@extends('layouts.main')

@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-5">
            <div class="container" style="text-align: center">
                <h4>Create a Room</h4>
                <br>
                <a href="{{ route('fight.fightroom', ['team' => $team, 'roomID' => $roomId]) }}" class="btn btn-success">Create room</a>
            </div>
        </div>
        <div class="col-7">
            <div class="container" style="text-align: center">
                <h4>Join a Room</h4>
                <br>
                <form action="{{ route('fight.fightjoin', ['team' => $team]) }}" class="form-inline">
                    <div class="form-group row" style="margin-left: 200px">
                        <div class="col-sm-6">
                            <input type="text" name="roomId"class="form-control" value="" placeholder="Room ID">
                        </div>
                        <div class="col-sm-2">
                            <input type="submit" value="Join" class="btn btn-success">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="container text-center">
    @auth
        <h3><strong>Team ID: </strong>{{ $team->id }}</h3>
        <h3><strong>Team Name: </strong>{{ $team->name }}</h3>
    @endauth
</div>
<br>
<div class="container">
    <div class="row">
        @for ($i = 0; $i < 3; $i++)
            <div class="col">
                <div class="containers" style="border: 3px black solid; border-radius: 5px">
                    <div class="row">
                        <div class="col-5">
                            <img src="{{ $pokemons[$i]->image}}" alt="" width="150px" height="150px" style="border: 2px black solid; border-radius: 5px">
                        </div>
                        <div class="col-7">
                            <div class="container" style="text-align: center">
                                <h6>{{ $pokemons[$i]->name }} ({{$pokemons[$i]->hp }} HP)</h6>
                            </div>
                            <div class="row" style="margin-left: -50px">
                                <div class="col">
                                    <div class="contaner" style="text-align: center">
                                        {{ $pokemons[$i]->move1 }}
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="contaner" style="text-align: center">
                                        {{ $pokemons[$i]->move2 }}
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-left: -50px">
                                <div class="col">
                                    <div class="contaner" style="text-align: center">
                                        {{ $pokemons[$i]->move3 }}
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="contaner" style="text-align: center">
                                        {{ $pokemons[$i]->move4 }}
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row" style="margin-left: -50px">
                                <div class="col">
                                    <div class="contaner" style="text-align: center;" >
                                        <p style="border: 1px black solid; border-radius: 10px; display: inline-block; background-color: cornsilk">&nbsp{{ $pokemons[$i]->type1 }}&nbsp</p>
                                    </div>
                                </div>
                                <div class="col">
                                    @if ($pokemons[$i]->type2 != 'null' && $pokemons[$i]->type2 != 'Null')
                                    <div class="contaner" style="text-align: center;" >
                                        <p style="border: 1px black solid; border-radius: 10px; display: inline-block; background-color: cornsilk">&nbsp{{ $pokemons[$i]->type2 }}&nbsp</p>
                                    </div>
                                    @else
                                    <div class="contaner" style="text-align: center;" ></div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endfor
    </div>
    <br>
    <div class="row">
        @for ($i = 3; $i < 6; $i++)
            <div class="col">
                <div class="containers" style="border: 3px black solid; border-radius: 5px">
                    <div class="row">
                        <div class="col-5">
                            <img src="{{ $pokemons[$i]->image}}" alt="" width="150px" height="150px" style="border: 2px black solid; border-radius: 5px">
                        </div>
                        <div class="col-7">
                            <div class="container" style="text-align: center">
                                <h6>{{ $pokemons[$i]->name }} ({{$pokemons[$i]->hp }} HP)</h6>
                            </div>
                            <div class="row" style="margin-left: -50px">
                                <div class="col">
                                    <div class="contaner" style="text-align: center">
                                        {{ $pokemons[$i]->move1 }}
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="contaner" style="text-align: center">
                                        {{ $pokemons[$i]->move2 }}
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-left: -50px">
                                <div class="col">
                                    <div class="contaner" style="text-align: center">
                                        {{ $pokemons[$i]->move3 }}
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="contaner" style="text-align: center">
                                        {{ $pokemons[$i]->move4 }}
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row" style="margin-left: -50px">
                                <div class="col">
                                    <div class="contaner" style="text-align: center;" >
                                        <p style="border: 1px black solid; border-radius: 10px; display: inline-block; background-color: cornsilk">&nbsp{{ $pokemons[$i]->type1 }}&nbsp</p>
                                    </div>
                                </div>
                                <div class="col">
                                    @if ($pokemons[$i]->type2 != 'null' && $pokemons[$i]->type2 != 'Null')
                                    <div class="contaner" style="text-align: center;" >
                                        <p style="border: 1px black solid; border-radius: 10px; display: inline-block; background-color: cornsilk">&nbsp{{ $pokemons[$i]->type2 }}&nbsp</p>
                                    </div>
                                    @else
                                    <div class="contaner" style="text-align: center;" ></div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endfor
    </div>
</div>
@endsection
