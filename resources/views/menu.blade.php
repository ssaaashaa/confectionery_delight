@extends('layouts.app', ['title' => 'DELIGHT | Меню в зале'])

@section('content')
    <section class="section container">
        <header class="section__header">
            <h2 class="section__title">
                <span>Меню в зале</span>
            </h2>
        </header>
        <div class="section__body">

            <div class="menu">
                <div class="menu__categories">
                    <ul class="menu__categories-list grid grid--{{count($categories)}}">
                        @foreach($categories as $category)
                            <li class="menu__categories-item input">
                                <input id="menu-category-{{$category->id}}" type="radio"
                                       class="menu__categories-selected"
                                       name="menu_category" value="category-{{$category->id}}">
                                <label for="menu-category-{{$category->id}}">{{$category->name}}</label>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="menu__items">
                    <ul class="menu__items-list grid grid--4">
                        @foreach($products as $product)
                            <li class="menu__items-item">
                                <div class="menu-item">
                                    <img src="/storage/menu/{{$product->img}}" alt="" class="menu-item__image"
                                         width="250px" height="250px" loading="lazy"
                                    >
                                    <div class="menu-item__body">
                                        <div class="menu-item__title">
                                            <span>
                                                {{$product->name}}
                                            </span>
                                        </div>
                                        <div class="menu-item__description">
                                            <p>
                                                {{$product->description}}
                                            </p>
                                        </div>
                                        <div class="menu-item__price">
                                            <span>
                                                <b>{{$product->price}} BYN</b>
                                            </span>
                                            <span>
                                                {{$product->weight}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <script src="/js/menu.js"></script>
@endsection
