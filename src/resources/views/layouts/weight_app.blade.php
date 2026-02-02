<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PiGLy</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/weight_app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    @yield('css')
</head>

<body>
    <header class="header">
        <h1 class="site__title">PiGLy</h1>
        <div class="nav">
            <a href="/weight_logs/goal_setting" class="nav__setting">
                <i class="fa-solid fa-gear"></i>
                目標体重設定
            </a>
            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="nav__logout">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    ログアウト
                </button>
            </form>
        </div>
    </header>

    <main>
    @yield('content')
    </main>
</body>
</html>