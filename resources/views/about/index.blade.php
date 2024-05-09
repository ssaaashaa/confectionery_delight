@extends('layouts.app', ['title' => 'DELIGHT | О нас'])

@section('content')
    <section class="section section--hidden-x container">
        <header class="section__header">
            <h2 class="section__title">
                О кондитерской DELIGHT
            </h2>
        </header>
        <div class="section__body">
            <div class="about">
                <div class="about__title">
                    <p>
                        ВСЯ НАША ПРОДУКЦИЯ ПРОИЗВОДИТСЯ НА МЕСТЕ,
                        <br>
                        ПОЭТОМУ ОНА ВСЕГДА СВЕЖАЯ
                    </p>
                </div>
                <ul class="about__list grid grid--3">
                    <li class="about__item">
                        <div class="about-card">
                            <img src="/storage/img/cooking_icon.svg" alt="" class="about-card__image"
                                 width="110px" height="110px" loading="lazy">
                            <div class="about-card__body">
                                <p>
                                    Мы тщательно отбираем продукты для наших десертов и никогда не идем на компромиссы
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="about__item">
                        <div class="about-card">
                            <img src="/storage/img/rolling_pin_icon.svg" alt="" class="about-card__image"
                                 width="110px" height="110px" loading="lazy">
                            <div class="about-card__body">
                                <p>
                                    Каждый десерт делается вручную влюбленными в свое дело людьми. Мы любим, когда красиво                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="about__item">
                        <div class="about-card">
                            <img src="/storage/img/mitten_icon.svg" alt="" class="about-card__image"
                                 width="110px" height="110px" loading="lazy">
                            <div class="about-card__body">
                                <p>
                                    Мы никогда не готовим впрок, потому что считаем, что лучший десерт – свежий десерт                            </div>
                        </div>
                    </li>
                </ul>
                <div class="about__ingredients">
                    <p>
                        <span>
                            <b>ИНГРЕДИЕНТЫ</b>
                        </span>
                        <br>
                        МЫ ИСПОЛЬЗУЕМ САМЫЕ ЛУЧШИЕ И КАЧЕСТВЕННЫЕ ИНГРЕДИЕНТЫ, КОТОРЫЕ СПЕЦИАЛЬНО
                        <br>
                        ПРИВОЗИМ ИЗ ФРАНЦИИ, БЕЛЬГИИ, ГЕРМАНИИ И НИДЕРЛАНДОВ
                    </p>
                </div>
                <div class="about__conclusion">
                    <p>
                            Готовим сами! С любовью!
                    </p>
                </div>
                <a href="{{route('home')}}#catalog" class="about__button ">
                    <button class="button button--accent">
                        Перейти в каталог
                    </button>
                </a>
            </div>
        </div>
    </section>
@endsection
