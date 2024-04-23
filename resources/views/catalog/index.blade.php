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
@endsection





