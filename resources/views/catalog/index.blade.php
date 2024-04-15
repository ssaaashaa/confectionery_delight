@extends('layouts.app', ['title' => 'DELIGHT | Каталог'])

@section('content')
    <section class="section container">
        <div class="section__body">
            <h1>
                Каталог | {{$category->name}}
            </h1>
            @foreach($products as $product)
                @include("catalog.partials.product", ["product"=>$product, "category"=>$category])
            @endforeach
        </div>
    </section>
@endsection





