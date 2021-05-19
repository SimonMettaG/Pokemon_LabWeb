@extends('layouts.main')

@section('content')

<div style="background-image: url('https://www.pixelstalk.net/wp-content/uploads/images1/Pokemon-Wallpapers-HD.png'); background-size: cover;">
    <div class="text-center">
    <br>
    <h1>Battle</h1>
    <h4>Room ID: {{$roomId}}</h4>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col" style="border: 1px black solid;">
                <div class="container">
                    <div style="text-align: center;"><h2>Team: {{$team->name}}</h2></div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <img id="mainImage"  value="{{$pokemons[0]->id}}" src="{{$pokemons[0]->image}}" alt="" class="rounded" style="border: 1px black solid; background-color: white;" height="200px" width="200px">
                        </div>
                        <div class="col text-center">
                            <div class="row" style="margin-top: 5px;">
                                <div class="container" style="text-align: center;">
                                    <button id="mainM1" value="{{$pokemons[0]->move1}}" class="btn btn-primary" style="width: 100%">{{$pokemons[0]->move1}}</button>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 5px;">
                                <div class="container" style="text-align: center;">
                                    <button id="mainM2" value="{{$pokemons[0]->move2}}" class="btn btn-primary" style="width: 100%">{{$pokemons[0]->move2}}</button>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 5px;">
                                <div class="container" style="text-align: center;">
                                    <button id="mainM3" value="{{$pokemons[0]->move3}}" class="btn btn-primary" style="width: 100%">{{$pokemons[0]->move3}}</button>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 5px;">
                                <div class="container" style="text-align: center;">
                                    <button id="mainM4" value="{{$pokemons[0]->move4}}" class="btn btn-primary" style="width: 100%">{{$pokemons[0]->move4}}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="container" style="text-align: center;">
                    <h4>
                        <label id="mainName" value="{{$pokemons[0]->name}}">{{$pokemons[0]->name}}</label>
                        <label>: HP</label> 
                        <label id="mainHP" value="[69/420]">[69/420] </label>
                    </h4>
                </div>
                <h4>Pokémon:</h4>
                <div class="container" style="text-align: center;">
                    <div class="row" style="margin-left: -20px; margin-right: auto;">
                        @for ($i = 1; $i < 6; $i++)
                        <div class="col col-2" style="margin-left: auto;">
                            <button class="btn btn-white" style="color: white; background-color: white" onclick="swapPokemon({{$i}}, {{$pokemons[$i]->id}})">
                                <img id="{{ 'benchImage' . $i }}" src="{{$pokemons[$i]->image}}" alt="" class="rounded" style="border: 1px black solid;" height="50px" width="50px">
                                <p id="{{ 'benchName' . $i }}" style="font-size: x-small; color: black">{{$pokemons[$i]->name}} </p>
                                <p style="font-size: x-small; color: black">HP </p>
                                <p id="{{ 'benchHP' . $i }}" style="font-size: x-small; color: black">[100/100] </p>
                                <p id="{{ 'benchMove1' . $i }}" style="font-size: x-small; color: black">{{$pokemons[$i]->move1}} </p>
                                <p id="{{ 'benchMove2' . $i }}" style="font-size: x-small; color: black">{{$pokemons[$i]->move2}} </p>
                                <p id="{{ 'benchMove3' . $i }}" style="font-size: x-small; color: black">{{$pokemons[$i]->move3}} </p>
                                <p id="{{ 'benchMove4' . $i }}" style="font-size: x-small; color: black">{{$pokemons[$i]->move4}} </p>
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
                    <a class="btn btn-success">START</a>
                    <br>
                    <br>
                    <a href="{{ route('teams.index') }}" class="btn btn-danger">GIVE UP</a>
                </div>
            </div>
            <div class="col" style="border: 1px black solid;">
                <div class="container">
                    <div style="text-align: center;"><h2 id="teamName">Team: [enemy team]</h2></div>
                    <br>
                    <div class="row">
                        <div class="container" style="text-align: center;">
                            <img id="{{ 'pokemonImage0'}}"  alt="" class="rounded" style="border: 1px black solid; background-color: white" height="200px" width="200px">
                        </div>
                    </div>
                </div>
                <br>
                <div class="container" style="text-align: center;">
                    <h4 id="{{ 'pokemonName0'}}">[Pokémon] : HP [69/420]</h4>
                </div>
                <h4>Pokémon:</h4>
                <div class="container" style="text-align: center;">
                    <div class="row" style="margin-left: -50px; margin-right: auto;">
                        @for ($i = 1; $i < 6; $i++)
                        <div id="{{ 'pokemonSlot' . $i }}" class="col col-2" style="margin-left: auto;">
                            <button class="btn btn-white" style="color: white; background-color: white;">
                                <img id="{{ 'pokemonImage' . $i }}"  alt="" class="rounded" style="border: 1px black solid;" height="50px" width="50px">
                                <p id="{{ 'pokemonName' . $i }}" style="font-size: x-small; color: black">Pokémon {{$i}}<br>HP [100/100]
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
            <textarea class="form-control" id="" rows="5" style="font-size: x-small; resize: none" readonly></textarea>
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

    Echo.private("swap."+roomId)
        .listen('PokemonSwap', function(data) {
            console.log(data);
        }
    );
    
    function swapPokemon(id, dbID) {
      
      let mainPokemonImage = $('#mainImage').attr('src');
      let mainPokemonM1 = $('#mainM1').val();
      let mainPokemonM2 = $('#mainM2').val();
      let mainPokemonM3 = $('#mainM3').val();
      let mainPokemonM4 = $('#mainM4').val();
      let mainPokemonName = $('#mainName').attr('value');
      let mainPokemonHP = $('#mainHP').attr('value');
      let mainPokemonID = $('#mainImage').attr('value');
      
      let benchPokemonImage = $( '#benchImage' + id).attr('src');
      let benchPokemonHP = $( '#benchHP' + id).text();
      let benchPokemonName = $( '#benchName' + id).text();
      let benchPokemonMove1 = $( '#benchMove1' + id).text();
      let benchPokemonMove2 = $( '#benchMove2' + id).text();
      let benchPokemonMove3 = $( '#benchMove3' + id).text();
      let benchPokemonMove4 = $( '#benchMove4' + id).text();
    
      $('#mainImage').attr('src', benchPokemonImage);
      $('#mainM1').html(benchPokemonMove1);
      $('#mainM1').val(benchPokemonMove1);
      $('#mainM2').html(benchPokemonMove2);
      $('#mainM2').val(benchPokemonMove2);
      $('#mainM3').html(benchPokemonMove3);
      $('#mainM3').val(benchPokemonMove3);
      $('#mainM4').html(benchPokemonMove4);
      $('#mainM4').val(benchPokemonMove4);
      $('#mainName').attr('value', benchPokemonName);
      $('#mainName').html(benchPokemonName);
      $('#mainHP').attr('value', benchPokemonHP);
      $('#mainHP').html(benchPokemonHP);
      $('#mainImage').attr('value', dbID);

      $('#benchImage'+ id).attr('src', mainPokemonImage);
      $('#benchMove1'+ id).html(mainPokemonM1);
      $('#benchMove1'+ id).val(mainPokemonM1);
      $('#benchMove2'+ id).html(mainPokemonM2);
      $('#benchMove2'+ id).val(mainPokemonM2);
      $('#benchMove3'+ id).html(mainPokemonM3);
      $('#benchMove3'+ id).val(mainPokemonM3);
      $('#benchMove4'+ id).html(mainPokemonM4);
      $('#benchMove4'+ id).val(mainPokemonM4);
      $('#benchName'+ id).attr('value', mainPokemonName);
      $('#benchName'+ id).html(mainPokemonName);
      $('#benchHP'+ id).attr('value', mainPokemonHP);
      $('#benchHP'+ id).html(mainPokemonHP);
    
      $.ajax({
            url: '{{ route('fight.changePokemon') }}',
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                mainPokemonID : mainPokemonID,
                benchPokemonID  : dbID,
                position : id,
                roomId: roomId,
            }
        })
        .done(function(response) {
            
            console.log(response);
        })
        .fail(function(jqXHR, response) {
            console.log('Fallido', response);
        });
    }

</script>

@endpush
