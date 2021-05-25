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
                            <img id="mainImage" name="0" value="{{$pokemons[0]->id}}" src="{{$pokemons[0]->image}}" alt="" class="rounded" style="border: 1px black solid; background-color: white;" height="200px" width="200px">
                        </div>
                        <div class="col text-center">
                            <div class="row" style="margin-top: 5px;">
                                <div class="container" style="text-align: center;">
                                    <button onclick="makeMove(0)" id="mainM1" value="{{$pokemons[0]->move1}}" class="btn btn-primary"
                                        style="width: 100%" title="">
                                        {{$pokemons[0]->move1}}
                                    </button>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 5px;">
                                <div class="container" style="text-align: center;">
                                    <button onclick="makeMove(1)" id="mainM2" value="{{$pokemons[0]->move2}}" class="btn btn-primary" 
                                        style="width: 100%" title="">
                                        {{$pokemons[0]->move2}}
                                    </button>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 5px;">
                                <div class="container" style="text-align: center;">
                                    <button onclick="makeMove(2)" id="mainM3" value="{{$pokemons[0]->move3}}" class="btn btn-primary" 
                                        style="width: 100%" title="">
                                        {{$pokemons[0]->move3}}
                                    </button>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 5px;">
                                <div class="container" style="text-align: center;">
                                    <button onclick="makeMove(3)" id="mainM4" value="{{$pokemons[0]->move4}}" class="btn btn-primary"
                                        style="width: 100%" title="">
                                        {{$pokemons[0]->move4}}
                                    </button>
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
                        <label id="mainHP" value="{{$pokemons[0]->hp}}">[{{$pokemons[0]->hp}}] </label>
                    </h4>
                </div>
                <h4>Pokémon:</h4>
                <div class="container" style="text-align: center;">
                    <div class="row" style="margin-left: -20px; margin-right: auto;">
                        @for ($i = 1; $i < 6; $i++)
                        <div class="col col-2" style="margin-left: auto;">
                            <button id="{{'swapButton'.$i}}" class="btn btn-white" style="color: white; background-color: white" onclick="swapPokemon({{$i}}, {{$pokemons[$i]->id}})">
                                <img id="{{ 'benchImage' . $i }}" name="{{$i}}" src="{{$pokemons[$i]->image}}" alt="" class="rounded" style="border: 1px black solid;" height="50px" width="50px">
                                <p id="{{ 'benchName' . $i }}" style="font-size: x-small; color: black">{{$pokemons[$i]->name}} </p>
                                <p id="{{ 'benchHP' . $i }}" style="font-size: x-small; color: black" value="{{$pokemons[$i]->hp}}">HP [{{$pokemons[$i]->hp}}] </p>
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
                    <div id="centralButtons">
                        <div class="alert alert-info">
                            <p>Waiting for opponent...</p>
                        </div>
                        <a href="{{ route('teams.index') }}" class="btn btn-danger">EXIT ROOM</a>
                    </div>
                </div>
            </div>
            <div class="col" style="border: 1px black solid;">
                <div class="container">
                    <div style="text-align: center;"><h2 id="teamName">Team: [enemy team]</h2></div>
                    <br>
                    <div class="row">     
                        <div class="col">
                            <img id="pokemonImage0" alt="" class="rounded" style="border: 1px black solid; background-color: white" height="200px" width="200px">
                        </div>
                        <div class="col text-center">
                            <div class="row" style="margin-top: 5px;">
                                <div class="container" style="text-align: center;">
                                    <button id="mainM1Alt" value="[]" class="btn btn-primary" style="width: 100%" disabled>...</button>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 5px;">
                                <div class="container" style="text-align: center;">
                                    <button id="mainM2Alt" value="[]" class="btn btn-primary" style="width: 100%" disabled>...</button>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 5px;">
                                <div class="container" style="text-align: center;">
                                    <button id="mainM3Alt" value="[]" class="btn btn-primary" style="width: 100%" disabled>...</button>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 5px;">
                                <div class="container" style="text-align: center;">
                                    <button id="mainM4Alt" value="[]" class="btn btn-primary" style="width: 100%" disabled>...</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="container" style="text-align: center;">
                    <h4 id="{{ 'pokemonName0'}}">[Pokémon] : HP [?]</h4>
                </div>
                <h4>Pokémon:</h4>
                <div class="container" style="text-align: center;">
                    <div class="row" style="margin-left: -50px; margin-right: auto;">
                        @for ($i = 1; $i < 6; $i++)
                        <div id="{{ 'pokemonSlot' . $i }}" class="col col-2" style="margin-left: auto;">
                            <button class="btn btn-white" style="color: white; background-color: white;">
                                <img id="{{ 'pokemonImage' . $i }}"  alt="" class="rounded" style="border: 1px black solid;" height="50px" width="50px">
                                <p id="{{ 'pokemonName' . $i }}" style="font-size: x-small; color: black">Pokémon {{$i}}<br>HP [?]
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
    let roomId = {!! json_encode($roomId) !!};
    let team = {!! json_encode($team) !!};
    let pokemons = {!! json_encode($pokemons) !!};
    let move_info = {!! json_encode($move_info) !!};

    let turn = 1;
    let host = 1;
    let currentMove={type: null};
    let opMove={type: null};
    let round=0;

    /*

    Event listeners

    */

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
            console.log(user.name);
            let theURL='{{ route('fight.endFight')}}';
            $.ajax({
                url: theURL,
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    state: 1
                }
            })
            .done(function(response) {
                alert("Player left: "+user.name);
                console.log(response);

                if(response.success){
                    $('#centralButtons').html('<div class="alert alert-success"><p>'+response.success
                    +'</p></div><a href="{{ route('teams.index') }}" class="btn btn-danger">EXIT ROOM</a>');
                }
                else{
                    $('#centralButtons').html('<a href="{{ route('teams.index') }}" class="btn btn-danger">Prueba</a>');
                }
            })
            .fail(function(jqXHR, response) {
                console.log('Fallido', response);
            });
        })
        .listen('JoinedRoom', function(data) {
            var i = 1;
            //console.log("Soy anfitrion");
            
            var pokemonArray = data.pokemons.data;
            $('#teamName').html('Team: '+data.team.name);
            $('#pokemonImage0').attr('src', pokemonArray[0].image);
            $('#pokemonName0').html(pokemonArray[0].name+': HP <label id="mainHPAlt" value="'+pokemonArray[0].hp+'">['+pokemonArray[0].hp+']</label>');
            $('#mainM1Alt').html(pokemonArray[0].move1);
            $('#mainM2Alt').html(pokemonArray[0].move2);
            $('#mainM3Alt').html(pokemonArray[0].move3);
            $('#mainM4Alt').html(pokemonArray[0].move4);

            $('#centralButtons').html('<a class="btn btn-success" onclick="startFight()">START</a><br><br><a href="{{ route('teams.index') }}" class="btn btn-danger">GIVE UP</a><br>');

            for(i; i<6; i++){
                $('#pokemonImage'+i).attr('src', pokemonArray[i].image);
                $('#pokemonName'+i).html(
                    pokemonArray[i].name+'<br><br><label id="benchHPAlt'+i+'" value="'+pokemonArray[i].hp+'">HP ['+pokemonArray[i].hp+']</label><br><br>'
                    + pokemonArray[i].move1+'<br><br>'+ pokemonArray[i].move2+'<br><br>'+ pokemonArray[i].move3+'<br><br>'+ pokemonArray[i].move4
                );
            }
        })
        .error((error) => {
            console.error(error);
        });

    Echo.private("receive."+roomId)
        .listen('ReceivePokemon', function(data) {
            var i = 1;
            //console.log("Soy guest");
            host=0;
            
            var pokemonArray = data.pokemons.data;
            $('#teamName').html('Team: '+data.team.name);
            $('#pokemonImage0').attr('src', pokemonArray[0].image);
            $('#pokemonName0').html(pokemonArray[0].name+': HP <label id="mainHPAlt" value="'+pokemonArray[0].hp+'">['+pokemonArray[0].hp+']</label>');
            $('#mainM1Alt').html(pokemonArray[0].move1);
            $('#mainM2Alt').html(pokemonArray[0].move2);
            $('#mainM3Alt').html(pokemonArray[0].move3);
            $('#mainM4Alt').html(pokemonArray[0].move4);

            $('#centralButtons').html('<div class="alert alert-success"><p>Waiting for host to start fight</p></div><a href="{{ route('teams.index') }}" class="btn btn-danger">GIVE UP</a><br>');

            for(i; i<6; i++){
                $('#pokemonImage'+i).attr('src', pokemonArray[i].image);
                $('#pokemonName'+i).html(
                    pokemonArray[i].name+'<br><br><label id="benchHPAlt'+i+'" value="'+pokemonArray[i].hp+'">HP ['+pokemonArray[i].hp+']</label><br><br>'
                    + pokemonArray[i].move1+'<br><br>'+ pokemonArray[i].move2+'<br><br>'+ pokemonArray[i].move3+'<br><br>'+ pokemonArray[i].move4
                );
            }
    });

    Echo.private("swap."+roomId)
        .listen('PokemonSwap', function(data) {
            opMove={type: "swap", data: data};

            if(host){
                $('#waiting').remove();
                $('#continueButton').html('<div id="continueButton"><button onclick="processOpAction()" class="btn btn-primary">CONTINUE</button></div>');
            }
        }
    );

    Echo.private("physical-special."+roomId)
        .listen('SendMove', function(data) {
            opMove={type: "phySpe", data: data};

            console.log(data);

            if(host){
                $('#waiting').remove();
                $('#continueButton').html('<div id="continueButton"><button onclick="processOpAction()" class="btn btn-primary">CONTINUE</button></div>');
            }
        }
    );

    Echo.private("start."+roomId)
        .listen('StartFight', function(data) {
            $('#centralButtons').html('<div class="alert alert-success"><p>Choose your first pokemon</p></div>'+
            '<button id="noSwap" onclick="skipSwap()" class="btn btn-info">DON\'T SWAP</button><br><br>'+
            '<a href="{{ route('teams.index') }}" class="btn btn-danger">GIVE UP</a><br>');

            $('#mainM1').attr('title', move_info[0][0]['damage_class']['name']+': '+move_info[0][0]['power']);
            $('#mainM2').attr('title', move_info[0][1]['damage_class']['name']+': '+move_info[0][1]['power']);
            $('#mainM3').attr('title', move_info[0][2]['damage_class']['name']+': '+move_info[0][2]['power']);
            $('#mainM4').attr('title', move_info[0][3]['damage_class']['name']+': '+move_info[0][3]['power']);

            turn=1;   
        }
    );

    Echo.private("process."+roomId)
        .listen('ProcessTurn', function(data) {
            round+=1;
            if(opMove.type=="swap"){
                processSwap();
            }
            else if(opMove.type=="phySpe"){
                processOpPhySpeAttack();
            }

            if(currentMove.type=="phySpe"){
                processPhySpeAttack();
            }

            $('#centralButtons').html('<div class="alert alert-success"><p>Round '+round+'</p></div>'+
                    '<div class="alert alert-success"><p>Make your move...</p></div>'+
                    '<a href="{{ route('teams.index') }}" class="btn btn-danger">GIVE UP</a><br>');
            turn = 1; 
        }
    );

    function startFight(){
        $.ajax({
            url: '{{ route('fight.startFight') }}',
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                roomId: roomId,
            }
        })
        .done(function(response) {
            
            //console.log(response);

            $('#centralButtons').html('<div class="alert alert-success"><p>Choose your first pokemon</p></div>'+
            '<div id="waiting" class="alert alert-success"><p>Waiting for opponent...</p></div>'+
            '<button id="noSwap" onclick="skipSwap()" class="btn btn-info">DON\'T SWAP</button><br><br>'+
            '<div id="continueButton"><button onclick="processOpAction()" class="btn btn-primary" disabled>CONTINUE</button></div><br><br>'+
            '<a href="{{ route('teams.index') }}" class="btn btn-danger">GIVE UP</a><br>');

            $('#mainM1').attr('title', move_info[0][0]['damage_class']['name']+': '+move_info[0][0]['power']);
            $('#mainM2').attr('title', move_info[0][1]['damage_class']['name']+': '+move_info[0][1]['power']);
            $('#mainM3').attr('title', move_info[0][2]['damage_class']['name']+': '+move_info[0][2]['power']);
            $('#mainM4').attr('title', move_info[0][3]['damage_class']['name']+': '+move_info[0][3]['power']);


            turn=1;
        })
        .fail(function(jqXHR, response) {
            console.log('Fallido', response);
        });
    }
    
    function swapPokemon(id, dbID) {
      if(turn){
        turn=0;

        let mainPokemonImage = $('#mainImage').attr('src');
        let mainPokemonM1 = $('#mainM1').val();
        let mainPokemonM2 = $('#mainM2').val();
        let mainPokemonM3 = $('#mainM3').val();
        let mainPokemonM4 = $('#mainM4').val();
        let mainPokemonName = $('#mainName').attr('value');
        let mainPokemonHP = $('#mainHP').attr('value');
        let mainPokemonID = $('#mainImage').attr('value');
        let mainPokemonIndex = $('#mainImage').attr('name');
        
        let benchPokemonImage = $( '#benchImage' + id).attr('src');
        let benchPokemonHP = $( '#benchHP' + id).attr('value');
        let benchPokemonName = $( '#benchName' + id).text();
        let benchPokemonMove1 = $( '#benchMove1' + id).text();
        let benchPokemonMove2 = $( '#benchMove2' + id).text();
        let benchPokemonMove3 = $( '#benchMove3' + id).text();
        let benchPokemonMove4 = $( '#benchMove4' + id).text();
        let benchPokemonIndex = $('#benchImage'+ id).attr('name');
        
        $('#mainImage').attr('src', benchPokemonImage);
        $('#mainM1').html(benchPokemonMove1);
        $('#mainM1').val(benchPokemonMove1);
        $('#mainM1').attr('title', move_info[benchPokemonIndex][0]['damage_class']['name']+': '+move_info[benchPokemonIndex][0]['power']);
        $('#mainM2').html(benchPokemonMove2);
        $('#mainM2').val(benchPokemonMove2);
        $('#mainM2').attr('title', move_info[benchPokemonIndex][1]['damage_class']['name']+': '+move_info[benchPokemonIndex][1]['power']);
        $('#mainM3').html(benchPokemonMove3);
        $('#mainM3').val(benchPokemonMove3);
        $('#mainM3').attr('title', move_info[benchPokemonIndex][2]['damage_class']['name']+': '+move_info[benchPokemonIndex][2]['power']);
        $('#mainM4').html(benchPokemonMove4);
        $('#mainM4').val(benchPokemonMove4);
        $('#mainM4').attr('title', move_info[benchPokemonIndex][3]['damage_class']['name']+': '+move_info[benchPokemonIndex][3]['power']);
        $('#mainName').attr('value', benchPokemonName);
        $('#mainName').html(benchPokemonName);
        $('#mainHP').attr('value', benchPokemonHP);
        $('#mainHP').html('['+benchPokemonHP+']');
        $('#mainImage').attr('value', dbID);
        $('#mainImage').attr('name', benchPokemonIndex);

        $('#benchImage'+ id).attr('src', mainPokemonImage);
        $('#benchImage'+ id).attr('name', mainPokemonIndex);
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
        $('#benchHP'+ id).html('HP ['+mainPokemonHP+']');
        $('#swapButton'+id).attr('onclick', "swapPokemon("+id+","+mainPokemonID+")");
        
        currentMove={type:"swap", mainPokemonID : dbID, benchPokemonID  : mainPokemonID, position : id};
        //console.log(currentMove);

        if(host==0){
            if(round==0){
                $('#centralButtons').html('<div id="waiting" class="alert alert-success"><p>Waiting for host...</p></div>'+
                    '<a href="{{ route('teams.index') }}" class="btn btn-danger">GIVE UP</a><br>');
            }
            else{
                $('#centralButtons').html('<div id="waiting" class="alert alert-success"><p>Round '+round+'</p></div>'+
                    '<div class="alert alert-success"><p>Waiting for host...</p></div>'+
                    '<a href="{{ route('teams.index') }}" class="btn btn-danger">GIVE UP</a><br>');
            }
        }
        else if(host==1){
            $('#noSwap').remove();
        }

        $.ajax({
            url: '{{ route('fight.changePokemon') }}',
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                mainPokemonID: dbID,
                benchPokemonID : mainPokemonID,
                position : id,
                roomId: roomId,
            }
        })
        .done(function(response) {
            //console.log(response);
        })
        .fail(function(jqXHR, response) {
            console.log('Fallido', response);
        });
      }
      
    }

    function skipSwap(){
        if(turn==1){
            turn=0;

            if(host==1){
                $('#noSwap').remove();
            }
            else{
                $('#centralButtons').html('<div class="alert alert-success"><p>Waiting for host...</p></div>'+
                '<a href="{{ route('teams.index') }}" class="btn btn-danger">GIVE UP</a><br>');
            }

            $.ajax({
                url: '{{ route('fight.changePokemon') }}',
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    mainPokemonID: pokemons.data[0].id,
                    benchPokemonID : pokemons.data[0].id,
                    position : 0,
                    roomId: roomId
                }
            })
            .done(function(response) {
                
                console.log(response);
            })
            .fail(function(jqXHR, response) {
                console.log('Fallido', response);
            });
        }
        else{
            alert("You already swapped");
        }
    }

    function makeMove(moveNumber){
        if(round>0 && turn==1){
            turn=0;
            let mainPokemonIndex = $('#mainImage').attr('name');
            let move_stats = move_info[mainPokemonIndex][moveNumber];

            //console.log(move_stats);

            if(host==0){
                $('#centralButtons').html('<div id="waiting" class="alert alert-success"><p>Round '+round+'</p></div>'+
                        '<div class="alert alert-success"><p>Waiting for host...</p></div>'+
                        '<a href="{{ route('teams.index') }}" class="btn btn-danger">GIVE UP</a><br>');
            }
            if(move_stats.damage_class.name=="physical" || move_stats.damage_class.name=="special"){
                $.ajax({
                    url: '{{ route('fight.sendMove') }}',
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        name: move_stats.name,
                        power: move_stats.power,
                        type: move_stats.type.name,
                        roomId: roomId,
                    }
                })
                .done(function(response) {
                    
                    console.log(response);
                })
                .fail(function(jqXHR, response) {
                    console.log('Fallido', response);
                });
            
                currentMove={type:"phySpe", name: move_stats.name, power: move_stats.power, typeMove: move_stats.type.name};
            }
        }
    }

    function processOpAction(){
        if(turn==0){
            round+=1;

            $.ajax({
                url: '{{ route('fight.processTurn') }}',
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    roomId: roomId,
                }
            })
            .done(function(response) {
                
                $('#centralButtons').html('<div class="alert alert-success"><p>Round '+round+'</p></div>'+
                '<div id="waiting" class="alert alert-success"><p>Waiting for opponent...</p></div>'+
                '<div id="continueButton"><button onclick="processOpAction()" class="btn btn-primary" disabled>CONTINUE</button></div><br><br>'+
                '<a href="{{ route('teams.index') }}" class="btn btn-danger">GIVE UP</a><br>');
            })
            .fail(function(jqXHR, response) {
                console.log('Fallido', response);
            });

            if(opMove.type=="swap"){
                processSwap();
            }
            else if(opMove.type=="phySpe"){
                processOpPhySpeAttack();
            }
            if(currentMove.type=="phySpe"){
                processPhySpeAttack();
            }
            
            turn = 1;
        }
        else{
            console.log(turn);
            alert("Do something before continuing")
        }
    }

    function processSwap(){
        let data = opMove.data;

        if(data.position!=0){

            var i = data.position;

            let mainHP = $('#benchHPAlt'+i).attr('value');
            let benchHP = $('#mainHPAlt').attr('value');

            $('#teamName').html('Team: '+data.mainPokemonID.name);
            $('#pokemonImage0').attr('src', data.mainPokemonID.image);
            $('#pokemonName0').html(data.mainPokemonID.name+': HP <label id="mainHPAlt" value="'+mainHP+'">['+mainHP+']</label>');

            $('#mainM1Alt').html(data.mainPokemonID.move1);
            $('#mainM2Alt').html(data.mainPokemonID.move2);
            $('#mainM3Alt').html(data.mainPokemonID.move3);
            $('#mainM4Alt').html(data.mainPokemonID.move4);

            $('#pokemonImage'+i).attr('src', data.benchPokemonID.image);
            $('#pokemonName'+i).html(
                data.benchPokemonID.name+'<br><br><label id="benchHPAlt'+i+'" value="'+benchHP+'">HP ['+benchHP+']</label><br><br>'
                + data.benchPokemonID.move1+'<br><br>'+ data.benchPokemonID.move2+'<br><br>'+ data.benchPokemonID.move3+'<br><br>'+ data.benchPokemonID.move4
            );
        }
    }

    function processOpPhySpeAttack(){
        let mainPokemonHP = $('#mainHP').attr('value');

        let newHP = mainPokemonHP-opMove.data.power;

        if(newHP < 0){
            newHP = 0;
        }

        $('#mainHP').attr('value', newHP);
        $('#mainHP').html('['+newHP+']');
    }
    
    function processPhySpeAttack(){
        let opPokemonHP = $('#mainHPAlt').attr('value');

        let newHP = opPokemonHP-currentMove.power;

        if(newHP < 0){
            newHP = 0;
        }

        $('#mainHPAlt').attr('value', newHP);
        $('#mainHPAlt').html('['+newHP+']');
    }
    

</script>

@endpush
