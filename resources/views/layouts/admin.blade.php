<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    @vite(['resources/css/app.css'])
</head>
<body>
<header class="header">
    <div class="header__inner container">
        <a href="{{ route('admin.feedback-requests.index') }}">

            <span class="mx-3">Заявки с форм обратной связи</span>
        </a>
        <br>
        <a href="{{ route("admin.logout") }}">
            <button class="button">
                Выйти
            </button>
        </a>
    </div>
</header>
<main>
    @yield('content')
</main>
</body>
</html>
