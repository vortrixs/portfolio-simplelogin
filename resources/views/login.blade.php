<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
    </head>
    <body>
        <div class="wrapper">
            <form class="form-signin" action="{{ route('login.attempt') }}" method="post">
                <h2 class="form-signin-heading">Please login</h2>
                <span class="help-block">
                    <strong>{{ session('error') }}</strong>
                    <strong>{{ session('success') }}</strong>
                </span>
                <br>
                <br>
                {!! csrf_field() !!}
                <input type="text" class="form-control" name="username" placeholder="Username" required="" autofocus="" />
                <input type="password" class="form-control" name="password" placeholder="Password" required=""/>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
            </form>
            <br>
            <a href="{{ route('register.form') }}">Register new user<a>
        </div>
    </body>
</html>
