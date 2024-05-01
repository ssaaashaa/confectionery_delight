@extends('layouts.app', ['title' => 'DELIGHT | Каталог'])

@section('content')
    <script src="/js/category.js"></script>
    <section class="section container">
        <div class="section__body">
            <h1>
                Каталог | <span id="category_name">{{$category->name}}</span>
            </h1>
            <div class="design_categories">
                <div class="radio_btn">
                    <input id="design_category-0" type="radio" class="selected_category" name="design_category"
                           value="0" checked>
                    <label for="design_category-0">Все</label>
                </div>
                @foreach($design_categories as $design_category)
                    <div class="radio_btn">
                        <input id="design_category-{{$design_category->id}}" type="radio" class="selected_category"
                               name="design_category" value="product-{{$design_category->id}}">
                        <label for="design_category-{{$design_category->id}}">{{$design_category->name}}</label>
                    </div>
                @endforeach
                <div class="products" style="display: flex">
                    @foreach($products as $product)
                        @include("catalog.partials.product", ["product"=>$product, "category"=>$category])
                    @endforeach
                </div>
            </div>
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
    @endif
@endsection





