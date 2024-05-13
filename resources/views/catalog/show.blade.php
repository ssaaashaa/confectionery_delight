@extends('layouts.app', ['title' => 'DELIGHT | Каталог '])

@section('content')
    <section class="section section--hidden-x container">
        <div class="section__body">
            <div class="item">
                <img src="/storage/designs/{{$product->img}}" alt="" class="item__image"
                     width="400" height="400" loading="lazy"
                >
                <div class="item__body">
                    <h3 class="item__title">
                        {{$product->name}}
                    </h3>
                    <div class="item__description">
                        <p>
                            При выборе набора доступен 1 бисквит, 1 начинка и единое оформление.
                        </p>
                        <p>
                            Мы обещаем приложить максимум усилий, чтобы передать всю красоту и изысканность наших
                            десертов, и надеемся, что вы будете очарованы ими с первого взгляда.
                        </p>
                    </div>
                    <div class="item__details">
                        <div class="item__count component">
                            <div class="component__header">
                            <span>
                                Количество
                            </span>
                            </div>
                            <ul class="component__list grid grid--3">
                                <li class="component__item input">
                                    <input id="radio-6" value="6" type="radio" name="count" checked
                                           class="selected_count">
                                    <label class="selected_count" for="radio-6">6
                                        шт.</label>
                                </li>
                                <li class="component__item input">
                                    <input id="radio-9" value="9" type="radio" name="count" class="selected_count">
                                    <label class="selected_count" for="radio-9">9
                                        шт.</label>
                                </li>
                                <li class="component__item input">
                                    <input id="radio-12" value="12" type="radio" name="count" class="selected_count">
                                    <label class="selected_count" for="radio-12">12
                                        шт.</label>
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
                    <button class="button button--accent" id="addToCart" value="{{$product->id}}">Купить за &nbsp<span
                            id="count">{{ $price*$product->ratio}}</span>&nbsp BYN
                    </button>
                </div>
            </div>
        </div>
    </section>
    @include("layouts.partials.discount-banner")
    @include("layouts.partials.reviews")
    <script src="/js/product.js"></script>
@endsection

