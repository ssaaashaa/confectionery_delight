@extends('layouts.app', ['title' => 'DELIGHT | Подарочный бенто '])

@section('content')
    <div class="section section--hidden-x container">
        <header class="section__header section__header-start">
            <h2 class="section__title">
                <span>Подарочный бокс &laquoСобери бенто сам&raquo</span>
            </h2>
        </header>
        <div class="section__body">
            <div class="bento">
                <div class="bento__description">
                       <span>
                    Необычный и вкусный вариант подарка для детей и взрослых на день рождения или корпоратив!
                </span>
                </div>
                <div class="bento__details">
                    <span>
                        Что входит в стоимость бокса:
                    </span>
                    <ul class="bento__list grid grid--3">
                        <li class="bento__item">
                            <img src="/storage/img/biscuit.svg" alt="" class="bento__image"
                                 width="110px" height="110px" loading="lazy">
                            <span>
                                Коржи, крем, начинки
                            </span>
                        </li>
                        <li class="bento__item">
                            <img src="/storage/img/pastry_bag.svg" alt="" class="bento__image"
                                 width="110px" height="110px" loading="lazy">
                            <span>
                               Материалы и инструменты
                            </span>
                        </li>
                        <li class="bento__item">
                            <img src="/storage/img/gift.svg" alt="" class="bento__image"
                                 width="110px" height="110px" loading="lazy">
                            <span>
                              Подарочная упаковка
                            </span>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    <section class="section section--hidden-x container">
        <div class="section__body">
            <div class="item">
                <img src="/storage/designs/{{$image->img}}" alt="" class="item__image"
                     width="400" height="400" loading="lazy">
                <div class="item__body">
                    <h3 class="item__title">
                        Выберите подходящий для вас бокс
                    </h3>
                    <div class="item__details">
                        <div class="item__count component">
                            <div class="component__header">
                                <span>
                                    Вес бенто
                                </span>
                            </div>
                            <ul class="component__list grid grid--2">
                                <li class="component__item input">
                                    <input id="radio-1" value="400" type="radio" name="count" checked class="selected_count">
                                    <label class="selected_count" for="radio-1">400 гр</label>
                                </li>
                                <li class="component__item input">
                                    <input id="radio-2" value="800" type="radio" name="count" class="selected_count">
                                    <label class="selected_count" for="radio-2">800 гр</label>
                                </li>
                            </ul>

                        </div>
                        <div class="item__biscuits component">
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
                            {{--                            <div class="component__biscuits-info">--}}
                            {{--                                  <button class="button--link" type="button" onclick="biscuitsInfo.showModal()">--}}
                            {{--                                Узнать состав и КБЖУ вкусов--}}
                            {{--                            </button>--}}
                            {{--                            </div>--}}
                        </div>
                        <div class="item__fills component">
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
                    <button class="button button--accent" value="{{$image->id}}" id="addToCart">Купить за &nbsp<span id="price">{{$price}}</span>&nbsp
                        BYN
                    </button>
                </div>
            </div>
        </div>


{{--            <div>Вкус</div>--}}
{{--            <br>--}}
{{--            <div>--}}
{{--                @foreach($biscuits as $biscuit)--}}
{{--                    <div class="radio_btn">--}}
{{--                        <input id="{{$biscuit->id}}" type="radio" name="biscuit" class="selected_biscuit"--}}
{{--                               value="{{$biscuit->id}}">--}}
{{--                        <label for="{{$biscuit->id}}">{{$biscuit->name}}</label>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}

{{--            <div>Начинка</div>--}}
{{--            <br>--}}
{{--            <div>--}}
{{--                @foreach($fills as $fill)--}}
{{--                    <div class="radio_btn">--}}
{{--                        <input id="fill-{{$fill->id}}" type="radio" name="fill" class="selected_fill" disabled--}}
{{--                               value="{{$fill->id}}">--}}
{{--                        <label for="fill-{{$fill->id}}">{{$fill->name}}</label>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}
    </section>
    @include("layouts.partials.reviews")
    <script src="/js/bento.js"></script>
@endsection

