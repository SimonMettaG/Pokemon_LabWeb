@extends('layouts.main')

@section('content')

<div class="text-center">
    <h1>List of teams</h1>
    <br>
    @auth
    <input type="text" name="message" id="message">
        <input type="button" value="Enviar" onclick="sendMessage()">
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
            @foreach ($team as $item)
                <tr>
                    <td class="col">{{ $item->id }}</td>
                    <td class="col">{{ $item->name }}</td>
                    <td class="col"><a href="{{ route('teams.show', ['team' => $item]) }}" class="btn btn-primary">Show</a></td>
                    <td class="col"><a href="{{ route('teams.edit', ['team' => $item]) }}" class="btn btn-secondary">Update</a></td>
                    <td class="col">
                        <form action="{{ route('teams.destroy', ['team' => $item]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete" class="btn btn-danger">
                        </form>
                    </td>
                    <td class="col"><a href="{{ route('fight.fightroom', ['team' => $item]) }}" class="btn btn-info">Fight</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

@push('layout_end_body')

<script>
    function sendMessage() {
        console.log($('#message'));
        let theDescription = $('#message').val();
        $.ajax({
            url: '{{ route('fight.postFightMessage') }}',
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                message: theDescription
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

    Echo.private('chat')
        .listen('MessageSent', function(data) {
            console.log(data);
        });
</script>

@endpush
