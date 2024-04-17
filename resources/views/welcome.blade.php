@extends('layouts.app', ['title' => 'DELIGHT | Главная'])

@section('content')
    <section class="section container">
        <div class="section__body">
            <div class="hero">
                <a href="{{route('catalog.index',1)}}">
                    <button class="button">
                        Выбрать капкейки
                    </button>
                </a>
                <a href="{{route('catalog.index',2)}}">
                    <button class="button">
                        Выбрать трайфлы
                    </button>
                </a>
                <div class="hero__main">
                    <div class="hero__body">
                        <div class="hero__description">
                            <p>
                                Кондитерская "DELIGHT"
                            </p>
                        </div>
                        <h1 class="hero__title">
                            Превращаем<br>торты в искусство
                        </h1>
                        <button class="hero__button button">
                            Каталог
                        </button>
{{--                        @auth("web")--}}
{{--                            <a href="{{route('logout')}}">--}}
{{--                                <button class="hero__button button">--}}
{{--                                    Выйти--}}
{{--                                </button>--}}
{{--                            </a>--}}
{{--                        @endauth--}}
                        @guest("web")
                            <a href="{{route('login')}}">
                                <button class="hero__button button">
                                    Войти
                                </button>
                            </a>
                        @endguest
                    </div>
                    <img src="/storage/img/hero-bg.svg" alt="" class="hero__image"
                         width="595" height="450" loading="lazy"
                    >
                </div>
            </div>
        </div>
    </section>
@endsection
