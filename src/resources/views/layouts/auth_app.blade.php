<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PiGLy</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth_app.css') }}">
    @yield('css')
</head>
<body>
    <div class="container">
        <div class="card__inner auth">
            <header class="header">
                <h1 class="site__title">PiGLy</h1>
                @yield('header')
            </header>
            <div class="content">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>