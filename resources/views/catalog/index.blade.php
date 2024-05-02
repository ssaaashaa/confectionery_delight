@extends('layouts.app', ['title' => 'DELIGHT | Каталог'])

@section('content')
    <script src="/js/category.js"></script>
    <section class="section section--hidden-x container">
        <header class="section__header section__header-start">
            <h2 class="section__title">
                <span id="category_name">Каталог | {{$category->name}}</span>
            </h2>
        </header>
        <div class="section__body">
            <div class="design-categories">
                <ul class="design-categories__list grid grid--{{count($design_categories)+1}}">
                    <li class="design-categories__item input">
                        <input id="design_category-0" type="radio" class="design-categories__selected" name="design_category"
                               value="0" checked>
                        <label for="design_category-0">Все</label>
                    </li>
                    @foreach($design_categories as $design_category)
                        <li class="design-categories__item input">
                            <input id="design_category-{{$design_category->id}}" type="radio" class="design-categories__selected"
                                   name="design_category" value="product-{{$design_category->id}}">
                            <label for="design_category-{{$design_category->id}}">{{$design_category->name}}</label>
                        </li>
                    @endforeach

                </ul>
            </div>
            <div class="items">
                <ul class="items__list grid grid--4">
                    @foreach($products as $product)
                            @include("catalog.partials.product", ["product"=>$product, "category"=>$category])
                    @endforeach
                </ul>
            </div>
{{--            <div class="design_categories ">--}}
{{--                <div class="radio_btn">--}}

{{--                </div>--}}
{{--                @foreach($design_categories as $design_category)--}}
{{--                    <div class="radio_btn">--}}
{{--                        <input id="design_category-{{$design_category->id}}" type="radio" class="selected_category"--}}
{{--                               name="design_category" value="product-{{$design_category->id}}">--}}
{{--                        <label for="design_category-{{$design_category->id}}">{{$design_category->name}}</label>--}}
{{--                    </div>--}}
{{--                @endforeach--}}

{{--            </div>--}}
        </div>
    </section>
    {{--    {{$category->name}}--}}
    @if ($category->name === "Капкейки")
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
                                        Срок годности капкейков 72 часа. Хранить в герметичной или закрытой коробке и
                                        только в холодильнике.
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
                                        Капкейк состоит из: бисквит + начинка + шапочка из кремчиза (творожный сыр,
                                        сливки, сахарная пудра). </p>
                                </div>
                            </details>
                        </li>
                        <li class="question-answer__item">
                            <details class="question-answer__accordion">
                                <summary class="question-answer__accordion-header">
                                    <h3 class="question-answer__accordion-title">
                                        Как получаются яркие цвета у крема? Безопасно ли это? </h3>
                                    <span class="question-answer__accordion-indicator">

                                </span>
                                </summary>
                                <div class="question-answer__accordion-body">
                                    <p>
                                        Крем для покрытия тортов мы можем по вашему желанию окрасить в любой цвет и его
                                        оттенок. Для этого мы используем безопасный пищевой гелевый краситель
                                        AmeriColor. При заказе продукции с ярким цветом будьте готовы к тому, что крем
                                        (особенно тёмных оттенков) может окрасить рот. Это абсолютная норма и
                                        натуральные красители (черника, свекла и др.) также обладают этим свойством.
                                        Окрашивание не перманентное, смывается простой водой или чаем. Если вас
                                        беспокоит этот вопрос – выберите пастельный или белый цвет. </p>
                                </div>
                            </details>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
    @endif
@endsection





