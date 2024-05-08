@extends('layouts.app', ['title' => 'DELIGHT | Главная'])

@section('content')
    <section class="section container">
        <div class="section__body">
            <div class="hero">
                <div class="hero__main">
                    <div class="hero__body">
                        <div class="hero__description">
                            <p>
                                Кондитерская "DELIGHT"
                            </p>
                        </div>
                        <h1 class="hero__title">
                            Превращаем <br>торты в искусство
                        </h1>
                        <a href="#catalog">
                            <button class="hero__button button">
                                Каталог
                            </button>
                        </a>
                        <div class="hero__slogan">
                            <p>
                                Сладости правят миром
                            </p>
                        </div>
                    </div>
                    <img src="/storage/img/hero-bg.svg" alt="" class="hero__image"
                         width="595" height="450" loading="lazy"
                    >
                </div>
            </div>
        </div>
    </section>
    @include("layouts.partials.discount-banner")
    @include("layouts.partials.presentation-banner")
    <section class="section container" id="catalog">
        <header class="section__header">
            <h2 class="section__title">
                Каталог
            </h2>
        </header>
        <div class="section__body">
            <div class="categories">
                <ul class="categories__list grid grid--1">
                    <li class="categories__item">
                        <article class="category-card">
                            <h3 class="category-card__title category-card__title-hidden">
                                Капкейки
                            </h3>
                            <img src="/storage/img/category-1.svg" alt="" class="category-card__image"
                                 width="226px" height="242px" loading="lazy">
                            <div class="category-card__body">
                                <h3 class="category-card__title category-card__title-visible">
                                    Капкейки
                                </h3>
                                <div class="category-card__details">
                                    <span class="category-card__price">
                                        от 30 BYN
                                    </span>
                                    <p class="category-card__description">
                                        Влажный бисквит с насыщенной начинкой, нежнейшие шапочки из сливочного крема и
                                        современный дизайн.
                                    </p>
                                </div>
                                <a href="{{route('catalog.index',1)}}">
                                    <button class="category-card__button button">
                                        Выбрать капкейки
                                    </button>
                                </a>
                            </div>
                        </article>
                    </li>
                    <li class="categories__item">
                        <article class="category-card">
                            <div class="category-card__body">
                                <h3 class="category-card__title category-card__title-visible">
                                    Трайфлы
                                </h3>
                                <div class="category-card__details">
                                    <span class="category-card__price">
                                        от 32 BYN
                                    </span>
                                    <p class="category-card__description">
                                        Трайфлы получаются такими вкусными, потому что мы используем только натуральные
                                        ингредиенты.
                                    </p>
                                </div>
                                <a href="{{route('catalog.index',2)}}">
                                    <button class="category-card__button button">
                                        Выбрать трайфлы
                                    </button>
                                </a>
                            </div>
                            <img src="/storage/img/category-2.svg" alt="" class="category-card__image"
                                 width="226px" height="242px" loading="lazy">
                            <h3 class="category-card__title category-card__title-hidden">
                                Трайфлы
                            </h3>
                        </article>

                    </li>
                    <li class="categories__item">
                        <article class="category-card">
                            <h3 class="category-card__title category-card__title-hidden">
                                Торт на заказ
                            </h3>
                            <img src="/storage/img/category-3.svg" alt="" class="category-card__image"
                                 width="226px" height="242px" loading="lazy">
                            <div class="category-card__body">
                                <h3 class="category-card__title category-card__title-visible">
                                    Торт на заказ
                                </h3>
                                <div class="category-card__details">
                                    <span class="category-card__price">
                                        от 80 BYN
                                    </span>
                                    <p class="category-card__description">
                                        Профессиональные кондитеры, лучшие ингредиенты и стильный дизайн.
                                        Только представьте торт, и мы его сделаем!
                                    </p>
                                </div>
                                <a href="{{route('cake.index')}}">
                                    <button class="category-card__button button">
                                        Собрать торт
                                    </button>
                                </a>
                            </div>
                        </article>
                    </li>
                    <li class="categories__item">
                        <article class="category-card">
                            <div class="category-card__body">
                                <h3 class="category-card__title category-card__title-visible">
                                    Подарочный бокс
                                    <br>
                                    “Собери бенто сам”
                                </h3>
                                <div class="category-card__details">
                                    <span class="category-card__price">
                                        от 32 BYN
                                    </span>
                                    <p class="category-card__description">
                                        Необычный и вкусный подарочный бокс для взрослых и детей на день рождения или
                                        любой другой праздник!
                                    </p>
                                </div>
                                <a href="{{route('bento.index')}}">
                                    <button class="category-card__button button">
                                        Выбрать бокс
                                    </button>
                                </a>
                            </div>
                            <img src="/storage/img/category-4.svg" alt="" class="category-card__image"
                                 width="267px" height="242px" loading="lazy">
                            <h3 class="category-card__title category-card__title-hidden">
                                Подарочный бокс
                                <br>
                                “Собери бенто сам”
                            </h3>
                        </article>

                    </li>
                </ul>
            </div>
        </div>
    </section>
    @include("layouts.partials.reviews")
    @include("layouts.partials.tastes-banner")
    <script src="/js/main.js"></script>
@endsection
