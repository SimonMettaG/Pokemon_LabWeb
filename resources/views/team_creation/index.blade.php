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
    <table class="table" style="width: 100%">
        <thead>
            <tr>
                <th style="width: 10%">#</th>
                <th style="width: 30%">Name</th>
                <th style="width: 15%"></th>
                <th style="width: 15%"></th>
                <th style="width: 15%"></th>
                <th style="width: 15%"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($teams as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td><a href="{{ route('teams.show', ['team' => $item]) }}" class="btn btn-primary">Show</a></td>
                    <td><a href="{{ route('teams.edit', ['team' => $item]) }}" class="btn btn-secondary">Update</a></td>
                    <td>
                        <form action="{{ route('teams.destroy', ['team' => $item]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete" class="btn btn-danger">
                        </form>
                    </td>
                    <td><a href="{{ route('fight.fightselect', ['team' => $item]) }}" class="btn btn-info">Fight</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
