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
                <a href="{{route('cake.index')}}">
                    <button class="button">
                        Собрать торт
                    </button>
                </a>
                <a href="{{route('bento.index')}}">
                    <button class="button">
                        Выбрать бокс
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
            <h2>Отзывы</h2>
            <div class="reviews">
                @foreach($reviews as $review)
                    <div class="review">
                        <div>
                            <img src="/storage/users/{{$review->avatar}}" alt=""
                                 width="150`" height="150" id="user_avatar" loading="lazy"
                            >
                            {{$review->name}}<br>
                       {{$review->review}}<br>
                        {{date('d.m.Y', strtotime($review->created_at))}}</div>
                    </div>
                    <br>
                @endforeach
            </div>
        </div>
    </section>
@endsection
