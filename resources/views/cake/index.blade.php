@extends('layouts.app', ['title' => 'DELIGHT | Каталог '])

@section('content')
    <section class="section section--hidden-x container">
        <header class="section__header">
            <h2 class="section__title">
                <span>Торт на заказ</span>
            </h2>
        </header>
        <div class="section__body">
            <div class="cake">
                <div class="cake__components">
                    <div class="cake__image">
                        <div class="cake__view">
                        <span>
                            Разрез вашего торта
                            <br>
                            будет выглядеть так:
                        </span>
                        </div>
                        <img style="opacity: 0.05" src="/storage/biscuits/snickers.png"
                             alt=""
                             class="tier"
                             width="120px" height="50px" loading="lazy">
                        <img style="opacity: 0.05" src="/storage/biscuits/snickers.png"
                             alt=""
                             class="tier"
                             width="165px" height="50px" loading="lazy">
                        <img style="opacity: 0.05" src="/storage/biscuits/snickers.png"
                             alt=""
                             class="tier"
                             width="205px" height="auto" loading="lazy">
                        <img src="/storage/biscuits/snickers.png"
                             alt=""
                             class="tier"
                             width="250px" height="auto" loading="lazy">
                        <img src="/storage/biscuits/plate.png"
                             alt=""
                             width="250px" height="auto" loading="lazy">
                    </div>
                    <div class="cake__body">
                        <div class="cake__price">
                            <p>
                                ~<span id="cake_price">{{$price*2}}</span> BYN
                            </p>
                        </div>
                        <div class="cake__details">
                            <div class="cake__count component">
                                <div class="component__header">
                                <span>
                                    Количество ярусов
                                </span>
                                </div>
                                <ul class="component__list grid grid--4">
                                    <li class="component__item input">
                                        <input id="radio-1" value="1" type="radio" name="count" checked
                                               class="selected_count">
                                        <label class="selected_count" for="radio-1">1</label>
                                    </li>
                                    <li class="component__item input">
                                        <input id="radio-2" value="2" type="radio" name="count" class="selected_count">
                                        <label class="selected_count" for="radio-2">2</label>
                                    </li>
                                    <li class="component__item input">
                                        <input id="radio-3" value="3" type="radio" name="count" class="selected_count">
                                        <label class="selected_count" for="radio-3">3</label>
                                    </li>
                                    <li class="component__item input">
                                        <input id="radio-4" value="4" type="radio" name="count" class="selected_count">
                                        <label class="selected_count" for="radio-4">4</label>
                                    </li>
                                </ul>
                                <div class="cake__weight">
                                    <p>
                                        Вес торта ~<span id="cake_weight">2</span> кг
                                    </p>
                                </div>
                            </div>
                            <div class="cake__biscuits component">
                                <div class="component__header">
                            <span>
                                Вкус
                            </span>
                                </div>
                                <ul class="component__list grid grid--{{count($biscuits)}}">
                                    @foreach($biscuits as $biscuit)
                                        <li class="component__item input">
                                            <input id="{{$biscuit->id}}" type="radio" name="biscuit"
                                                   class="selected_biscuit"
                                                   value="{{$biscuit->id}}">
                                            <label for="{{$biscuit->id}}">{{$biscuit->name}}</label>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="cake__fills component">
                                <div class="component__header">
                            <span>
                                Начинка
                            </span>
                                </div>
                                <ul class="component__list grid grid--{{count($fills)}}">
                                    @foreach($fills as $fill)
                                        <li class="component__item input">
                                            <input id="fill-{{$fill->id}}" type="radio" name="fill" class="selected_fill"
                                                   disabled value="{{$fill->id}}">
                                            <label for="fill-{{$fill->id}}">{{$fill->name}}</label>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cake__designs">
                    <div class="cake__title">
                        <h3>
                            <span>Примеры тортов</span>
                        </h3>
                    </div>
                    <div class="cake__description">
                        <p>
                            Выберете максимально подходящий дизайн торта, который вам
                            понравился. Если вы хотите внести изменения - напишите об этом при оформлении заказа!
                        </p>
                        <p>
                            *первый вариант дизайна - дизайн обсуждается лично с заказчиком (при наличии конкретных пожеланий)
                        </p>
                    </div>
                    <div class="cake__examples grid grid--4">
                        @foreach($designs as $design)
                            <div class="cake__example">
                                <img width="250" height="auto" loading="lazy" src="/storage/designs/{{$design->img}}"
                                     alt="">
                                <div class="radio-btn">
                                    <input id="design-{{$design->id}}" type="radio" name="design" value="{{$design->id}}"
                                           checked class="selected_design">
                                    <label  for="design-{{$design->id}}">✔</label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <button id="addToCart" class="button cake__button">Добавить в корзину</button>
            </div>
        </div>
    </section>
    <script src="/js/cake.js"></script>
@endsection
