@extends('layouts.main')

@section('content')
<h1>List of teams</h1>
<p>
    @auth
        <a href="{{ route('teams.create') }}">Create a team</a>
    @endauth
</p>
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($teams as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>
                    <a href="{{ route('teams.show', ['team' => $item]) }}">
                        Show
                    </a> |
                    <a href="{{ route('teams.edit', ['team' => $item]) }}">
                        Update
                    </a>
                    <form action="{{ route('teams.destroy', ['team' => $item]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
