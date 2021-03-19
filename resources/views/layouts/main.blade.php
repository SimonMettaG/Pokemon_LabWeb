<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Mi Pokemon</title>
</head>
<body>
    @auth
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <span class="navbar-brand mb-0 h1" style="margin-left: 10px">My Pokemon</span>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('teams.index') }}">See your Teams</a>
                </li>
            </ul>
        </div>
        <ul class="navbar-nav ml-auto" style="margin-right: 10px">
            <li class="nav-item active">
                <span class="navbar-text mb-0 align-middle" style="margin-right: 10px">{{ auth()->user()->email }}</span>
            </li>
            <li class="nav-item active">
                <a class="nav-link btn btn-danger" href="{{ route('auth.logout') }}">Logout</a>
            </li>
        </ul>
    </nav>
    @endauth
    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>
