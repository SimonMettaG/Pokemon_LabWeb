@extends('layouts.main')

@section('content')

<div class="text-center">
    <h1>List of teams</h1>
    <br>
    @auth
    <input type="text" name="message" id="message">
        <input type="button" value="Enviar" onclick="sendMessage({{$roomId}})">
    @endauth
</div>

<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th class="col">#</th>
                <th class="col">Name</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td class="col">{{ $team->id }}</td>
                    <td class="col">{{ $team->name }}</td>
                    <td class="col"><a href="{{ route('teams.show', ['team' => $team]) }}" class="btn btn-primary">Show</a></td>
                    <td class="col"><a href="{{ route('teams.edit', ['team' => $team]) }}" class="btn btn-secondary">Update</a></td>
                    <td class="col">
                        <form action="{{ route('teams.destroy', ['team' => $team]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete" class="btn btn-danger">
                        </form>
                    </td>
                    <td class="col"><a href="{{ route('fight.fightroom', ['team' => $team]) }}" class="btn btn-info">Fight</a></td>
                </tr>
            
        </tbody>
    </table>
</div>

@endsection

@push('layout_end_body')

<script>
    var roomId = {!! json_encode($roomId) !!};
    var team = {!! json_encode($team) !!};
    console.log(team);
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
            console.log(data);
        });
    
    Echo.join("join."+roomId)
        .here((users) => {
            console.log(users)
        })
        .joining((user) => {
            console.log(user.id);
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
                console.log(response);
            })
            .fail(function(jqXHR, response) {
                console.log('Fallido', response);
            });
        })
        .leaving((user) => {
            console.log(user.id);
        })
        .listen('JoinedRoom', function(data) {
            console.log(data);
        })
        .error((error) => {
            console.error(error);
        });
    
    Echo.private("receive."+roomId)
        .listen('ReceivePokemon', function(data) {
            console.log(data);
        });
</script>

@endpush
