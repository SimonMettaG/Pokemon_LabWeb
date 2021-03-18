<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mi Pokemon</title>
</head>
<body>
    @auth
    <div>
        {{ auth()->user()->email }}
        <button><a href="{{ route('auth.logout') }}">Logout</a> </button>
    </div>
    <br>
    <div>
        <a href="{{ route('teams.index') }}">See your Teams</a>
    </div>
    @endauth
    @yield('content')
</body>
</html>
