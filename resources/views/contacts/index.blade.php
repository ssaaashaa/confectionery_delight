@extends('layouts.app', ['title' => 'DELIGHT | Контакты'])

@section('content')
    <section class="section section--hidden-x container">
        <header class="section__header">
            <h2 class="section__title">
                Контакты
            </h2>
        </header>
        <div class="section__body">
            <div class="contacts">
                <div class="contacts__contacts">
                    <div class="contacts__title">
                        <span>
                            Контакты
                        </span>
                    </div>
                    <div class="contacts__body">
                        <p>Телефон: <a href="tel:80291326372">+375 (29) 132-63-72</a></p>
                        <p>E-mail: <a href="mailto: confectionery.delight@yandex.ru">confectionery.delight@yandex.ru</a>
                        </p>
                    </div>
                </div>
                <div class="contacts__address">
                    <div class="contacts__title">
                        <span>
                            Адрес
                        </span>
                    </div>
                    <div class="contacts__body">
                        <p>г. Минск, ул. Сиреневая, д. 33</p>
                    </div>
                </div>
                <div class="contacts__schedule">
                    <div class="contacts__title">
                        <span>
                            Режим работы
                        </span>
                    </div>
                    <div class="contacts__body">
                        <p> Наша кондитерская работает ежедневно с 9:00 до 21:00 без выходных
                        </p>
                    </div>
                </div>
                <div class="contacts__route">
                    <a class="contacts__route-button" href="https://yandex.by/maps/157/minsk/?ll=27.555691%2C53.906966&mode=routes&rtext=~53.972165%2C27.551869&rtt=mt&ruri=~ymapsbm1%3A%2F%2Fgeo%3Fdata%3DCgoxNTkyNjE0ODY3EowB0JHQtdC70LDRgNGD0YHRjCwg0JzRltC90YHQutGWINGA0LDRkdC9LCDQn9Cw0L_Rj9GA0L3Rj9C90YHQutGWINGB0LXQu9GM0YHQsNCy0LXRgiwg0LLRkdGB0LrQsCDQptC90Y_QvdC60LAsINCR0Y3Qt9Cw0LLQsNGPINCy0YPQu9GW0YbQsCwgMzMiCg08atxBFYDjV0I%2C&z=11.9">
                        <img src="/storage/img/route.svg"
                             alt=""
                             class="contacts__image"
                             width="24px" height="auto" loading="lazy">
                        <button class="button button--no-style">
                            Построить маршрут
                        </button>
                    </a>
                </div>


            </div>
        </div>
    </section>
@endsection
