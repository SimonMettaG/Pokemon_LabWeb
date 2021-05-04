@extends('layouts.main')

@section('content')

<div style="background-image: url('https://www.pixelstalk.net/wp-content/uploads/images1/Pokemon-Wallpapers-HD.png'); background-size: cover;">
    <div class="text-center">
    <br>
    <h1>Battle</h1>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col" style="border: 1px black solid; background-color: white;">
                <div class="container">
                    <div style="text-align: center;"><h2>Team: {{$team->name}}</h2></div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <img src="{{$pokemons[0]->image}}" alt="" class="rounded" style="border: 1px black solid;" height="200px" width="200px">
                        </div>
                        <div class="col text-center">
                            <div class="row" style="margin-top: 5px;">
                                <div class="container" style="text-align: center;">
                                    <button class="btn btn-primary">{{$pokemons[0]->move1}}</button>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 5px;">
                                <div class="container" style="text-align: center;">
                                    <button class="btn btn-primary">{{$pokemons[0]->move2}}</button>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 5px;">
                                <div class="container" style="text-align: center;">
                                    <button class="btn btn-primary">{{$pokemons[0]->move3}}</button>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 5px;">
                                <div class="container" style="text-align: center;">
                                    <button class="btn btn-primary">{{$pokemons[0]->move4}}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="container" style="text-align: center;">
                    <h4>{{$pokemons[0]->name}}: HP[69/420]</h4>
                </div>
                <h4>Pokemon:</h4>
                <div class="container" style="text-align: center;">
                    <div class="row" style="margin-left: -20px; margin-right: auto;">
                        @for ($i = 1; $i < 6; $i++)
                        <div class="col col-2" style="margin-left: auto;">
                            <button class="btn btn-white">
                                <img src="{{$pokemons[$i]->image}}" alt="" class="rounded" style="border: 1px black solid;" height="50px" width="50px">
                                <p style="font-size: x-small;">{{$pokemons[$i]->name}}<br>HP [100/100]<br><br>{{$pokemons[$i]->move1}}<br>{{$pokemons[$i]->move2}}<br>{{$pokemons[$i]->move3}}<br>{{$pokemons[$i]->move4}}</p>
                            </button>
                        </div>
                        @endfor
                    </div>
                </div>
                <br>
            </div>
            <div class="col col-lg-2">
                <div class="container" style="text-align: center;">
                    <h1>VS.</h1>
                    <br>
                    <br>
                    <br>
                    <br>
                    <button class="btn btn-danger">GIVE UP</button>
                </div>
            </div>
            <div class="col" style="border: 1px black solid; background-color: white;">
                <div class="container">
                    <div style="text-align: center;"><h2 id="teamName">Team: [enemy team]</h2></div>
                    <br>
                    <div class="row">
                        <div class="container" style="text-align: center;">
                            <img id="{{ 'pokemonImage0'}}" src="https://static.wikia.nocookie.net/espokemon/images/b/b9/Mudkip_%282004%29.png/revision/latest?cb=20120927232012" alt="" class="rounded" style="border: 1px black solid;" height="200px" width="200px">	
                        </div>
                    </div>
                </div>
                <br>
                <div class="container" style="text-align: center;">
                    <h4 id="{{ 'pokemonName0'}}">[pokemon]: HP[69/420]</h4>
                </div>
                <h4>Pokemon:</h4>
                <div class="container" style="text-align: center;">
                    <div class="row" style="margin-left: -50px; margin-right: auto;">
                        @for ($i = 1; $i < 6; $i++)
                        <div id="{{ 'pokemonSlot' . $i }}" class="col col-2" style="margin-left: auto;">
                            <button class="btn btn-white">
                                <img id="{{ 'pokemonImage' . $i }}" src="https://static.wikia.nocookie.net/espokemon/images/b/b9/Mudkip_%282004%29.png/revision/latest?cb=20120927232012" alt="" class="rounded" style="border: 1px black solid;" height="50px" width="50px">
                                <p id="{{ 'pokemonName' . $i }}" style="font-size: x-small;">Pokemon {{$i}}<br>HP [100/100]
                            </button>
                        </div>
                        @endfor
                    </div>
                </div>
                <br>
                <br>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="form-group">
            <textarea class="form-control" id="" rows="5" style="font-size: x-small;"></textarea>
        </div>
    </div>
    <br><br>
</div>

@endsection

@push('layout_end_body')

<script>
    var roomId = {!! json_encode($roomId) !!};
    var team = {!! json_encode($team) !!};
    //console.log(team);
    function sendMessage(roomId) {
        let theDescription = $('#message').val();
        $.ajax({
            url: '{{ route('fight.postFightMessage') }}',
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                message: theDescription,
                roomId: roomId
            }
        })
        .done(function(response) {
            $('#message').val('');


            console.log(response);
        })
        .fail(function(jqXHR, response) {
            console.log('Fallido', response);
        });
    }

    Echo.private("chat."+roomId)
        .listen('MessageSent', function(data) {
            //console.log(data);
        });
    
    Echo.join("join."+roomId)
        .here((users) => {
            //console.log(users)
        })
        .joining((user) => {
            //console.log(user.id);
            $.ajax({
                url: '{{ route('fight.receive') }}',
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    team: team,
                    roomId: roomId
                }
            })
            .done(function(response) {
                //console.log(response);
                //console.log(response.team);
            })
            .fail(function(jqXHR, response) {
                console.log('Fallido', response);
            });
        })
        .leaving((user) => {
            //console.log(user.id);
        })
        .listen('JoinedRoom', function(data) {
            var i = 1;
            //console.log(data);
            //console.log(data.pokemons);
            var pokemonArray = data.pokemons.data;
            $('#teamName').html('Team: '+data.team.name);
            $('#pokemonImage0').attr('src', pokemonArray[0].image);
            $('#pokemonName0').html(pokemonArray[0].name+': HP[69/420]');
            for(i; i<6; i++){
                $('#pokemonImage'+i).attr('src', pokemonArray[i].image);
                $('#pokemonName'+i).html(
                    pokemonArray[i].name+'<br>HP [100/100]<br><br>'+ pokemonArray[i].move1+'<br>'+ pokemonArray[i].move2+'<br>'+ pokemonArray[i].move3+'<br>'+ pokemonArray[i].move4
                );
            }
        })
        .error((error) => {
            console.error(error);
        });
    
    Echo.private("receive."+roomId)
        .listen('ReceivePokemon', function(data) {
            var i = 1;
            //console.log(data);
            //console.log(data.pokemons);
            var pokemonArray = data.pokemons.data;
            $('#teamName').html('Team: '+data.team.name);
            $('#pokemonImage0').attr('src', pokemonArray[0].image);
            $('#pokemonName0').html(pokemonArray[0].name+': HP[69/420]');
            for(i; i<6; i++){
                $('#pokemonImage'+i).attr('src', pokemonArray[i].image);
                $('#pokemonName'+i).html(
                    pokemonArray[i].name+'<br>HP [100/100]<br><br>'+ pokemonArray[i].move1+'<br>'+ pokemonArray[i].move2+'<br>'+ pokemonArray[i].move3+'<br>'+ pokemonArray[i].move4
                );
            }
        });
</script>

@endpush
