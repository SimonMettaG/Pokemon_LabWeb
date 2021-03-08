@extends('layouts.main')

@section('content')
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $team->id }}</td>
            <td>{{ $team->name }}</td>
        </tr>
    </tbody>
</table>
@endsection
