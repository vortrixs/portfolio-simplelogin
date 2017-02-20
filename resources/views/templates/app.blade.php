<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    @yield('assets')
    {{-- <link rel="stylesheet" href="{{ asset(elixir('css/all.css')) }}"> --}}
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">

        <div class="container">

            <div class="collapse navbar-collapse" id="nav-main">
                <ul class="nav navbar-nav">
                    <li><a href="{{ route('users.list') }}">All Users</a></li>
                    <li><a href="{{ route('user.profile', Auth::user()->id) }}">My Profile</a></li>
                    <li><a href="{{ route('logout') }}">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>
