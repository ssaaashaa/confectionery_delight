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
                        <button class="hero__button button">
                            Каталог
                        </button>
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
    <section class="section container">
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
    <section class="section container">
        <header class="section__header">
            <h2 class="section__title">
                Самые интересующие вопросы
            </h2>
        </header>
        <div class="section__body">
            <div class="question-answer">
                <ul class="question-answer__list">
                    <li class="question-answer__item">
                        <details class="question-answer__accordion" open>
                            <summary class="question-answer__accordion-header">
                                <h3 class="question-answer__accordion-title">
                                    Какой срок годности у капкейков?
                                </h3>
                                <span class="question-answer__accordion-indicator">
                                </span>
                            </summary>
                            <div class="question-answer__accordion-body">
                                <p>
                                    Срок годности капкейков 72 часа. Хранить в герметичной или закрытой коробке и только в холодильнике.
                                </p>
                            </div>
                        </details>
                    </li>
                    <li class="question-answer__item">
                        <details class="question-answer__accordion">
                            <summary class="question-answer__accordion-header">
                                <h3 class="question-answer__accordion-title">
                                    Из чего сделан крем?
                                </h3>
                                <span class="question-answer__accordion-indicator">

                                </span>
                            </summary>
                            <div class="question-answer__accordion-body">
                                <p>
                                    Капкейк состоит из: бисквит + начинка + шапочка из кремчиза (творожный сыр, сливки, сахарная пудра).                                </p>
                            </div>
                        </details>
                    </li>
                    <li class="question-answer__item">
                        <details class="question-answer__accordion">
                            <summary class="question-answer__accordion-header">
                                <h3 class="question-answer__accordion-title">
                                    Как получаются яркие цвета у крема? Безопасно ли это?                                </h3>
                                <span class="question-answer__accordion-indicator">

                                </span>
                            </summary>
                            <div class="question-answer__accordion-body">
                                <p>
                                    Крем для покрытия тортов мы можем по вашему желанию окрасить в любой цвет и его оттенок. Для этого мы используем безопасный пищевой гелевый краситель AmeriColor. При заказе продукции с ярким цветом будьте готовы к тому, что крем (особенно тёмных оттенков) может окрасить рот. Это абсолютная норма и натуральные красители (черника, свекла и др.) также обладают этим свойством. Окрашивание не перманентное, смывается простой водой или чаем. Если вас беспокоит этот вопрос – выберите пастельный или белый цвет.                                </p>
                            </div>
                        </details>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <script src="/js/main.js"></script>
@endsection
