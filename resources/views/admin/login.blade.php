<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ETicaret Projesi - Admin</title>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="/css/login.css">
</head>

<body>
    <div class="container">
        <form class="form-signin" action="{{ route('admin.login') }}" method="post">
            {{ csrf_field() }}
            <img src="/img/logo.png" class="logo">
            @include('layouts.partials.errors')
            <label for="mail" class="sr-only">Email</label>
            <input type="email" id="mail" name="mail" class="form-control" placeholder="email" required
                autofocus>
            <label for="password" class="sr-only">Şifre</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required
                aut>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="rememberme" value="1" checked> Beni hatırla
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Giriş Yap</button>
            <div class="links">
                <a href="{{ route('main') }}">&larr; Siteye Dön</a>
            </div>
        </form>
    </div>
    <script src='https://code.jquery.com/jquery-3.2.1.slim.min.js'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>

</body>

</html>
