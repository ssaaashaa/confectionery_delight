@extends('layouts.app', ['title' => 'DELIGHT | Регистрация'])

@section('content')
    <section class="section container">
    <div>
        <div>
            <h1>Вход</h1>

            <form method="POST" action="{{ route("admin.login_process") }}">
                @csrf

                <input name="email" type="text" class="w-full h-12 border border-gray-800 rounded px-3 @error('email') border-red-500 @enderror" placeholder="Email" />

                @error('email')
                <p class="text-red-500">{{ $message }}</p>
                @enderror

                <input name="password" type="password" class="w-full h-12 border border-gray-800 rounded px-3 @error('password') border-red-500 @enderror" placeholder="Пароль" />

                @error('password')
                <p class="text-red-500">{{ $message }}</p>
                @enderror



                <button type="submit" class="text-center w-full bg-blue-900 rounded-md text-white py-3 font-medium">Войти</button>
            </form>
        </div>
    </div>
    </section>
@endsection
