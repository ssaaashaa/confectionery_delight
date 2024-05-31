{{--@extends('layouts.app', ['title' => 'DELIGHT | Регистрация'])--}}

{{--@section('content')--}}
{{--    <section class="section container">--}}
{{--    <div>--}}
{{--        <div>--}}
{{--            <h1>Вход</h1>--}}

{{--            <form method="POST" action="{{ route("admin.login_process") }}">--}}
{{--                @csrf--}}

{{--                <input name="email" type="text" class="w-full h-12 border border-gray-800 rounded px-3 @error('email') border-red-500 @enderror" placeholder="Email" />--}}

{{--                @error('email')--}}
{{--                <p class="text-red-500">{{ $message }}</p>--}}
{{--                @enderror--}}

{{--                <input name="password" type="password" class="w-full h-12 border border-gray-800 rounded px-3 @error('password') border-red-500 @enderror" placeholder="Пароль" />--}}

{{--                @error('password')--}}
{{--                <p class="text-red-500">{{ $message }}</p>--}}
{{--                @enderror--}}



{{--                <button type="submit" class="text-center w-full bg-blue-900 rounded-md text-white py-3 font-medium">Войти</button>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    </section>--}}
{{--@endsection--}}

    <!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf_token" content="{{csrf_token()}}">
    <link rel="icon" href="/storage/img/icon.svg" style="width: max-content">
    <title></title>
    <link rel="stylesheet" href="/css/app.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<body class="page admin">

<main class="content">

        <div class="login">
            <div class="login__title">
                <h2>
                    Вход в панель администратора
                </h2>
            </div>

            <form method="POST" action="{{ route("admin.login_process") }}" class="login__form">
                @csrf

                <div class="order__field field">
                    <input name="email" class="field__input"
                           type="email" required autocomplete="off"
                           placeholder="Ваш e-mail">

                </div>
                <div class="order__field field">
                    <input name="password" class="field__input" id="admin_password"
                           type="password" required autocomplete="disabled"
                           placeholder="Ваш пароль">
                    @error('email')
                    <p>{{ $message }}</p>
                    @enderror
                    @error('login')
                    <p>{{ $message }}</p>
                    @enderror
                </div>


                <button type="submit" class="button login__button">
                    Войти
                </button>
            </form>
        </div>
</main>
<script src="/js/app.js"></script>
</body>
</html>


