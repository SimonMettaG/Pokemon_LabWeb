@extends('layouts.main')

@section('content')

<div class="text-center">
    <h1>List of teams</h1>
    <br>
    @auth
        <a href="{{ route('teams.create') }}" class="btn btn-success">Create a team</a>
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
            @foreach ($teams as $item)
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
                    <td class="col"><a href="{{ route('fight.fightselect', ['team' => $item]) }}" class="btn btn-info">Fight</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
