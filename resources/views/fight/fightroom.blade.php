@extends('layouts.main')

@section('content')

<div style="background-image: url('https://www.pixelstalk.net/wp-content/uploads/images1/Pokemon-Wallpapers-HD.png'); background-size: cover;">
    <div class="text-center">
    <br>
    <h2>Battle</h2>
    <h5>Room ID: {{$roomId}}</h5>
    </div>
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
                        <label id="mainHP" value="{{$pokemons[0]->hp}}">[{{$pokemons[0]->hp}}]</label>
                    </h4>
                </div>
                <h4>Pokémon:</h4>
                <div class="container" style="text-align: center;">
                    <div class="row" style="margin-left: -20px; margin-right: auto;">
                        @for ($i = 1; $i < 6; $i++)
                        <div class="col col-2" style="margin-left: auto;">
                            <button id="{{'swapButton'.$i}}" class="btn btn-white" style="color: white; background-color: white" onclick="swapPokemon({{$i}}, {{$pokemons[$i]->id}})">
                                <img id="{{ 'benchImage' . $i }}" name="{{$i}}" src="{{$pokemons[$i]->image}}" alt="" class="rounded" style="border: 1px black solid;" height="50px" width="50px">
                                <p id="{{ 'benchName' . $i }}" style="font-size: x-small; color: black">{{$pokemons[$i]->name}}</p>
                                <p id="{{ 'benchHP' . $i }}" style="font-size: x-small; color: black" value="{{$pokemons[$i]->hp}}">HP [{{$pokemons[$i]->hp}}]</p>
                                <p id="{{ 'benchMove1' . $i }}" style="font-size: x-small; color: black">{{$pokemons[$i]->move1}}</p>
                                <p id="{{ 'benchMove2' . $i }}" style="font-size: x-small; color: black">{{$pokemons[$i]->move2}}</p>
                                <p id="{{ 'benchMove3' . $i }}" style="font-size: x-small; color: black">{{$pokemons[$i]->move3}}</p>
                                <p id="{{ 'benchMove4' . $i }}" style="font-size: x-small; color: black">{{$pokemons[$i]->move4}}</p>
                            </button>
                        </div>
                        @endfor
                    </div>
                </div>
                <br>
            </div>
            <div class="col col-lg-2">
                <div class="container" style="text-align: center;">
                    <br>
                    <h1>VS.</h1>
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
                            <img id="pokemonImage0" name="0" alt="" class="rounded" style="border: 1px black solid; background-color: white" height="200px" width="200px">
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
                    <h4 id="{{'pokemonName0'}}">[Pokémon] : HP [?]</h4>
                </div>
                <h4>Pokémon:</h4>
                <div class="container" style="text-align: center;">
                    <div class="row" style="margin-left: -50px; margin-right: auto;">
                        @for ($i = 1; $i < 6; $i++)
                        <div id="{{ 'pokemonSlot' . $i }}" class="col col-2" style="margin-left: auto;">
                            <button class="btn btn-white" style="color: white; background-color: white;">
                                <img id="{{ 'pokemonImage' . $i }}"  name="{{$i}}" alt="" class="rounded" style="border: 1px black solid;" height="50px" width="50px">
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
            <textarea class="form-control display-4" id="battleLog" rows="3" style="resize: none" readonly>Room open.</textarea>
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

    let turn = 0;
    let host = 1;
    let currentMove={type: null};
    let opMove={type: null};
    let round=0;
    let livingPokemon = 6;
    let opponentPokemon = 6;

    let statusMoves={};
    let sleep=false;
    let attack=[1,1,1,1,1,1];
    let defense=[1,1,1,1,1,1];
    let defenseOp=[1,1,1,1,1,1]

    //console.log(move_info);

    for(let i=0; i<6; i++){
        for(let j=0; j<4; j++){
            if(move_info[i][j].damage_class.name=="status"){
                if(move_info[i][j].stat_changes.length==0 || move_info[i][j].stat_changes[0].stat.name == "speed"){
                    //Sleep 0
                    statusMoves[move_info[i][j].name]=[0, "sleep"];
                }
                else if(move_info[i][j].stat_changes[0].stat.name == "attack" || move_info[i][j].stat_changes[0].stat.name == "special-attack"){
                    if(move_info[i][j].stat_changes[0].change>0){
                        //More attack
                        statusMoves[move_info[i][j].name]=[1, "attack+"];
                    }
                    else{
                        //Less attack
                        statusMoves[move_info[i][j].name]=[2, "attack-"];
                    }
                }
                else if(move_info[i][j].stat_changes[0].stat.name == "defense" || move_info[i][j].stat_changes[0].stat.name == "special-defense"){
                    if(move_info[i][j].stat_changes[0].change>0){
                        //More defense
                        statusMoves[move_info[i][j].name]=[3, "defense+"];
                    }
                    else{
                        //Less defense
                        statusMoves[move_info[i][j].name]=[4, "defense-"];
                    }
                }
            }
        }
    }

    //console.log(statusMoves);

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
                //console.log(response);

                $('#battleLog').append('The opponent left. You won.\n');

                $('#centralButtons').html('<div class="alert alert-success"><p>'+response.success
                +'</p></div><a href="{{ route('teams.index') }}" class="btn btn-danger">EXIT ROOM</a>');
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

            $('#battleLog').append('\nOpponent arrived.\n');

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
            //console.log(data);
            if(data.type=="status"){
                opMove={type: "status", data: data};
            }
            else{
                opMove={type: "phySpe", data: data};
            }

            //console.log(opMove);

            if(host){
                $('#waiting').remove();
                $('#continueButton').html('<div id="continueButton"><button onclick="processOpAction()" class="btn btn-primary">CONTINUE</button></div>');
            }
        }
    );

    Echo.private("start."+roomId)
        .listen('StartFight', function(data) {
            $('#centralButtons').html('<div class="alert alert-success"><p>Choose your first pokémon</p></div>'+
            '<button id="noSwap" onclick="skipSwap()" class="btn btn-info">DON\'T SWAP</button><br><br>'+
            '<a href="{{ route('teams.index') }}" class="btn btn-danger">GIVE UP</a><br>');

            for(let i=0; i<4; i++){
                if(move_info[0][i]['damage_class']['name']=="status"){
                    $('#mainM'+(i+1)).attr('title', move_info[0][i]['damage_class']['name']+': '+statusMoves[move_info[0][i]['name']][1]);
                    
                }
                else{
                    $('#mainM'+(i+1)).attr('title', move_info[0][i]['damage_class']['name']+': '+move_info[0][i]['power']);
                }
            }

            $('#battleLog').append('\nBattle started by host.\n');
            $('#battleLog').append('Select a starting pokémon.\n');

            turn=1;   
        }
    );

    Echo.private("process."+roomId)
        .listen('ProcessTurn', function(data) {
            //console.log("Processing moves");
            //console.log(currentMove);
            //console.log(opMove);

            round+=1;
            if(opMove.type=="swap"){
                processSwap();
            }
            else if(opMove.type=="phySpe"){
                processOpPhySpeAttack();
            }
            else if(opMove.type=="status"){
                processOpStatus();
            }

            if(currentMove.type=="phySpe"){
                processPhySpeAttack();
            }
            else if(currentMove.type=="status"){
                processStatus();
            }


            if(livingPokemon<=0 && opponentPokemon<=0){
                alert("The match ended in a draw.");

                $('#battleLog').append('The battle ended in a draw.\n');

                $('#centralButtons').html('<div class="alert alert-warning"><p>Draw.</p></div><a href="{{ route('teams.index') }}" class="btn btn-danger">EXIT ROOM</a>');
            }
            else if(livingPokemon<=0){
                alert("All your pokémon fainted. You lost.");

                $('#battleLog').append('The battle ended. You lost.\n');

                $('#centralButtons').html('<div class="alert alert-danger"><p>You lost.</p></div><a href="{{ route('teams.index') }}" class="btn btn-danger">EXIT ROOM</a>');
            }
            else if(opponentPokemon<=0){
                alert("Enemy team defeated. You won!");

                $('#battleLog').append('The battle ended. You won.\n');

                $('#centralButtons').html('<div class="alert alert-success"><p>Enemy team defeated. You won!</p></div><a href="{{ route('teams.index') }}" class="btn btn-danger">EXIT ROOM</a>');
            }
            else{
                $('#centralButtons').html('<div class="alert alert-success"><p>Round '+round+'</p></div>'+
                    '<div class="alert alert-success"><p>Make your move...</p></div>'+
                    '<a href="{{ route('teams.index') }}" class="btn btn-danger">GIVE UP</a><br>');
                turn = 1;

                $('#battleLog').append('\n');
                $('#battleLog').append('Starting round '+round+'. Make your move.\n');
            }
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

            $('#centralButtons').html('<div class="alert alert-success"><p>Choose your first pokémon</p></div>'+
            '<div id="waiting" class="alert alert-success"><p>Waiting for opponent...</p></div>'+
            '<button id="noSwap" onclick="skipSwap()" class="btn btn-info">DON\'T SWAP</button><br><br>'+
            '<div id="continueButton"><button onclick="processOpAction()" class="btn btn-primary" disabled>CONTINUE</button></div><br><br>'+
            '<a href="{{ route('teams.index') }}" class="btn btn-danger">GIVE UP</a><br>');

            for(let i=0; i<4; i++){
                if(move_info[0][i]['damage_class']['name']=="status"){
                    $('#mainM'+(i+1)).attr('title', move_info[0][i]['damage_class']['name']+': '+statusMoves[move_info[0][i]['name']][1]);
                    
                }
                else{
                    $('#mainM'+(i+1)).attr('title', move_info[0][i]['damage_class']['name']+': '+move_info[0][i]['power']);
                }
            }

            $('#battleLog').append('Battle started.\n');
            $('#battleLog').append('Select a starting pokémon.\n');

            turn=1;
        })
        .fail(function(jqXHR, response) {
            console.log('Fallido', response);
        });
    }
    
    function swapPokemon(id, dbID) {
      if(turn){
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

        let disabled1 = $('#mainM1').prop('disabled');
        let disabled2 = $('#mainM1').prop('disabled');
        let disabled3 = $('#mainM1').prop('disabled');
        let disabled4 = $('#mainM1').prop('disabled');

        if(benchPokemonHP==0){
            alert("You can't switch with a fainted pokémon.");
            return 0;
        }

        turn=0;

        sleep=false;
        
        $('#mainImage').attr('src', benchPokemonImage);

        $('#mainM1').html(benchPokemonMove1);
        $('#mainM1').val(benchPokemonMove1);

        if(move_info[benchPokemonIndex][0]['damage_class']['name']=="status"){
            $('#mainM1').attr('title', move_info[benchPokemonIndex][0]['damage_class']['name']+': '+statusMoves[move_info[benchPokemonIndex][0]['name']][1]);
        }
        else{
            $('#mainM1').attr('title', move_info[benchPokemonIndex][0]['damage_class']['name']+': '+move_info[benchPokemonIndex][0]['power']);
        }

        if(disabled1==true){
            $('#mainM1').removeAttr("disabled");
        }

        $('#mainM2').html(benchPokemonMove2);
        $('#mainM2').val(benchPokemonMove2);

        if(move_info[benchPokemonIndex][1]['damage_class']['name']=="status"){
            $('#mainM2').attr('title', move_info[benchPokemonIndex][1]['damage_class']['name']+': '+statusMoves[move_info[benchPokemonIndex][1]['name']][1]);
        }
        else{
            $('#mainM2').attr('title', move_info[benchPokemonIndex][1]['damage_class']['name']+': '+move_info[benchPokemonIndex][1]['power']);
        }

        if(disabled2==true){
            $('#mainM2').removeAttr("disabled");
        }

        $('#mainM3').html(benchPokemonMove3);
        $('#mainM3').val(benchPokemonMove3);

        if(move_info[benchPokemonIndex][2]['damage_class']['name']=="status"){
            $('#mainM3').attr('title', move_info[benchPokemonIndex][2]['damage_class']['name']+': '+statusMoves[move_info[benchPokemonIndex][2]['name']][1]);
        }
        else{
            $('#mainM3').attr('title', move_info[benchPokemonIndex][2]['damage_class']['name']+': '+move_info[benchPokemonIndex][2]['power']);
        }

        if(disabled3==true){
            $('#mainM3').removeAttr("disabled");
        }

        $('#mainM4').html(benchPokemonMove4);
        $('#mainM4').val(benchPokemonMove4);

        if(move_info[benchPokemonIndex][3]['damage_class']['name']=="status"){
            $('#mainM4').attr('title', move_info[benchPokemonIndex][3]['damage_class']['name']+': '+statusMoves[move_info[benchPokemonIndex][3]['name']][1]);
        }
        else{
            $('#mainM4').attr('title', move_info[benchPokemonIndex][3]['damage_class']['name']+': '+move_info[benchPokemonIndex][3]['power']);
        }

        if(disabled4==true){
            $('#mainM4').removeAttr("disabled");
        }

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

        $('#battleLog').append('You swapped '+mainPokemonName+' for '+benchPokemonName+'.\n');

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

            $('#battleLog').append('You chose to stay with '+pokemons.data[0].name+'.\n');

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

                //console.log(response);
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
            let mainPokemonName = $('#mainName').attr('value');
            let move_stats = move_info[mainPokemonIndex][moveNumber];

            //console.log(move_stats);

            if(host==0){
                $('#centralButtons').html('<div id="waiting" class="alert alert-success"><p>Round '+round+'</p></div>'+
                        '<div class="alert alert-success"><p>Waiting for host...</p></div>'+
                        '<a href="{{ route('teams.index') }}" class="btn btn-danger">GIVE UP</a><br>');
            }

            if(sleep==true){
                //console.log("Move while sleeping");
                $.ajax({
                    url: '{{ route('fight.sendMove') }}',
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        name: move_stats.name,
                        power: 0,
                        type: move_stats.type.name,
                        roomId: roomId,
                    }
                })
                .done(function(response) {
                    
                    //console.log(response);
                })
                .fail(function(jqXHR, response) {
                    console.log('Fallido', response);
                });

                sleep=false;
            
                currentMove={type:"phySpe", name: move_stats.name, power: 0, typeMove: move_stats.type.name};

                $('#battleLog').append('Your '+mainPokemonName+' used '+move_stats.name+' but it was asleep.\n');

                return 0;
            }

            if(move_stats.damage_class.name=="physical" || move_stats.damage_class.name=="special"){
                let attackPower = move_stats.power*attack[mainPokemonIndex];
                attackPower=Math.round(attackPower);

                if(attackPower<=0){
                    attackPower=1;
                }

                $.ajax({
                    url: '{{ route('fight.sendMove') }}',
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        name: move_stats.name,
                        power: attackPower,
                        type: move_stats.type.name,
                        roomId: roomId,
                    }
                })
                .done(function(response) {
                    
                    //console.log(response);
                })
                .fail(function(jqXHR, response) {
                    console.log('Fallido', response);
                });
            
                currentMove={type:"phySpe", name: move_stats.name, power: attackPower, typeMove: move_stats.type.name};

                $('#battleLog').append('Your '+mainPokemonName+' used '+move_stats.name+' with a power of '+attackPower+'.\n');
            }
            else if(move_stats.damage_class.name=="status"){
                //console.log("Sent status attack");
                $.ajax({
                    url: '{{ route('fight.sendMove') }}',
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        name: move_stats.name,
                        power: statusMoves[move_stats.name][0],
                        type: "status",
                        roomId: roomId,
                    }
                })
                .done(function(response) {
                    
                    //console.log(response);
                })
                .fail(function(jqXHR, response) {
                    console.log('Fallido', response);
                });
            
                currentMove={type:"status", name: move_stats.name, power: statusMoves[move_stats.name][0], typeMove: "status"};

                $('#battleLog').append('Your '+mainPokemonName+' used '+move_stats.name+' with status effect '+statusMoves[move_stats.name][1]+'.\n');
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
                //console.log(response);
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
            else if(opMove.type=="status"){
                processOpStatus();
            }

            if(currentMove.type=="phySpe"){
                processPhySpeAttack();
            }
            else if(currentMove.type=="status"){
                processStatus();
            }

            if(livingPokemon<=0 && opponentPokemon<=0){
                alert("The battle ended in a draw.");

                $('#centralButtons').html('<div class="alert alert-warning"><p>Draw.</p></div><a href="{{ route('teams.index') }}" class="btn btn-danger">EXIT ROOM</a>');

                $('#battleLog').append('The battle ended in a draw.\n');
            }
            else if(livingPokemon<=0){
                alert("All your pokémon fainted. You lost.");

                $('#centralButtons').html('<div class="alert alert-danger"><p>You lost.</p></div><a href="{{ route('teams.index') }}" class="btn btn-danger">EXIT ROOM</a>');

                $('#battleLog').append('The battle ended. You lost.\n');
            }
            else if(opponentPokemon<=0){
                alert("Enemy team defeated. You won!");

                $('#centralButtons').html('<div class="alert alert-success"><p>Enemy team defeated. You won!</p></div><a href="{{ route('teams.index') }}" class="btn btn-danger">EXIT ROOM</a>');

                $('#battleLog').append('The battle ended. You won.\n');
            }
            else{
                $('#centralButtons').html('<div class="alert alert-success"><p>Round '+round+'</p></div>'+
                '<div id="waiting" class="alert alert-success"><p>Waiting for opponent...</p></div>'+
                '<div id="continueButton"><button onclick="processOpAction()" class="btn btn-primary" disabled>CONTINUE</button></div><br><br>'+
                '<a href="{{ route('teams.index') }}" class="btn btn-danger">GIVE UP</a><br>');

                turn = 1;

                $('#battleLog').append('\n');
                $('#battleLog').append('Starting round '+round+'. Make your move.\n');
            }
        }
        else{
            //console.log(turn);
            alert("Do something before continuing")
        }
    }

    function processSwap(){
        let data = opMove.data;

        if(data.position!=0){

            var i = data.position;

            let mainHP = $('#benchHPAlt'+i).attr('value');
            let benchHP = $('#mainHPAlt').attr('value');

            let mainIndex = $('#pokemonImage'+i).attr('name');
            let benchIndex = $('#pokemonImage0').attr('name');

            $('#teamName').html('Team: '+data.mainPokemonID.name);
            $('#pokemonImage0').attr('src', data.mainPokemonID.image);
            $('#pokemonName0').html(data.mainPokemonID.name+': HP <label id="mainHPAlt" value="'+mainHP+'">['+mainHP+']</label>');
            $('#pokemonImage0').attr('name', mainIndex);

            $('#mainM1Alt').html(data.mainPokemonID.move1);
            $('#mainM2Alt').html(data.mainPokemonID.move2);
            $('#mainM3Alt').html(data.mainPokemonID.move3);
            $('#mainM4Alt').html(data.mainPokemonID.move4);

            $('#pokemonImage'+i).attr('src', data.benchPokemonID.image);
            $('#pokemonName'+i).html(
                data.benchPokemonID.name+'<br><br><label id="benchHPAlt'+i+'" value="'+benchHP+'">HP ['+benchHP+']</label><br><br>'
                + data.benchPokemonID.move1+'<br><br>'+ data.benchPokemonID.move2+'<br><br>'+ data.benchPokemonID.move3+'<br><br>'+ data.benchPokemonID.move4
            );
            $('#pokemonImage'+i).attr('name', benchIndex);

            $('#battleLog').append('Opponent swapped '+data.benchPokemonID.name+' for '+data.mainPokemonID.name+'.\n');
        }
    }

    function processOpPhySpeAttack(){
        let mainPokemonHP = $('#mainHP').attr('value');
        let mainPokemonIndex = $('#mainImage').attr('name');
        let mainPokemonName = $('#mainName').attr('value');

        if(opMove.data.power==0){
            //alert("The opponent was asleep and could not attack.");
            $('#battleLog').append('The opponent\'s pokémon was asleep and could not attack.\n');
            return 0;
        }

        let opAttackPower = opMove.data.power / defense[mainPokemonIndex];
        opAttackPower=Math.round(opAttackPower);

        let newHP = mainPokemonHP-opAttackPower;

        if(newHP < 0){
            newHP = 0;
        }

        $('#battleLog').append('The opponent used '+opMove.data.name+' and dealt '+opAttackPower+' damage to your '+mainPokemonName+'.\n');
        $('#battleLog').append('Your '+mainPokemonName+' now has HP: '+newHP+'.\n');

        if(newHP == 0){
            livingPokemon--;
            $('#battleLog').append('Your '+mainPokemonName+' fainted. Switch it for another pokémon.\n');
            //alert("Your pokémon fainted. Switch it for another one.");
            $('#mainM1').prop('disabled', true);
            $('#mainM2').prop('disabled', true);
            $('#mainM3').prop('disabled', true);
            $('#mainM4').prop('disabled', true);
        }

        $('#mainHP').attr('value', newHP);
        $('#mainHP').html('['+newHP+']');
    }
    
    function processPhySpeAttack(){
        let opPokemonHP = $('#mainHPAlt').attr('value');
        let mainOpIndex = $('#pokemonImage0').attr('name');
        let mainPokemonName = $('#mainName').attr('value');

        if(currentMove.power==0){
            //alert("You were asleep and could not attack.");
            $('#battleLog').append('Your '+mainPokemonName+' was asleep and could not attack.\n');
            return 0;
        }

        let attackPower = currentMove.power / defenseOp[mainOpIndex];
        attackPower=Math.round(attackPower);

        let newHP = opPokemonHP-attackPower;

        if(newHP < 0){
            newHP = 0;
        }

        $('#battleLog').append('Your attack '+currentMove.name+' dealt '+attackPower+' damage to the opponent\'s pokémon.\n');
        $('#battleLog').append('The opponent\'s pokémon now has HP: '+newHP+'.\n');

        if(newHP == 0){
            opponentPokemon--;
            $('#battleLog').append('The opponent\'s pokémon fainted.\n');
        }

        $('#mainHPAlt').attr('value', newHP);
        $('#mainHPAlt').html('['+newHP+']');
    }

    function processOpStatus(){
        let mainPokemonName = $('#mainName').attr('value');
        let mainPokemonIndex = $('#mainImage').attr('name');

        let mainOpIndex = $('#pokemonImage0').attr('name');


        switch(opMove.data.power){
            case "0":
                //alert(mainPokemonName+" is asleep.");
                $('#battleLog').append('Your '+mainPokemonName+' was affected by '+opMove.data.name+' and is now asleep.\n');
                sleep=true;
                break;
            case "1":
                $('#battleLog').append('The opponent\'s pokémon got an attack buff.\n');
                break;
            case "2":
                //alert(mainPokemonName+" got an attack nerf.")
                $('#battleLog').append('Your '+mainPokemonName+' was affected by '+opMove.data.name+' and got an attack nerf.\n');
                attack[mainPokemonIndex]/=1.5;
                //console.log(attack);
                break;
            case "3":
                //alert("Opponent got a defense buff.")
                $('#battleLog').append('The opponent\'s pokémon got a defense buff.\n');
                defenseOp[mainOpIndex]*=1.5;
                //console.log(defenseOp);
                break;
            case "4":
                //alert(mainPokemonName+" got a defense nerf.")
                $('#battleLog').append('Your '+mainPokemonName+' was affected by '+opMove.data.name+' and got a defense nerf.\n');
                defense[mainPokemonIndex]/=1.5;
                //console.log(defense);
                break;
            default:
                break;
        }
    }

    function processStatus(){
        let mainPokemonName = $('#mainName').attr('value');
        let mainPokemonIndex = $('#mainImage').attr('name');
        let mainOpIndex = $('#pokemonImage0').attr('name');

        switch(currentMove.power){
            case 0 || "0": 
                $('#battleLog').append('The opponent\'s pokémon is now asleep.\n');
                break;
            case 1 || "1":
                $('#battleLog').append('Your '+mainPokemonName+' got an attack buff.\n');
                attack[mainPokemonIndex]*=1.5;
                break;
            case 2 || "2":
                $('#battleLog').append('The opponent\'s pokémon got an attack nerf.\n');
                break;
            case 3 || "3":
                $('#battleLog').append('Your '+mainPokemonName+' got a defense buff.\n');
                defense[mainPokemonIndex]*=1.5;
                break;
            case 4 || "4":
                $('#battleLog').append('The opponent\'s pokémon got a defense nerf.\n');
                defenseOp[mainOpIndex]/=1.5;
                break;
            default:
                if (currentMove.power == 0) {
                    $('#battleLog').append('The opponent\'s pokémon is now asleep.\n');
                }
                //$('#battleLog').append('The opponent\'s pokémon is now asleep.\n');
                break;
        }
    }
    

</script>

@endpush
