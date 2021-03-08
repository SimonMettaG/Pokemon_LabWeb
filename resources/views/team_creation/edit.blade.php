@extends('layouts.main')

@section('content')
<h1>Edit your team here!</h1>
<form action="{{ route('teams.update', ['team' => $team]) }}" method="POST">
    @csrf
    @method('PUT')
    
    <div>
        <label for="">Name</label>
        <input type="text" name="name" value="{{ $team->name }}">
    </div>
    <div>
        <input type="submit" value="Store">
    </div>
</form>
@endsection
