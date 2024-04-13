@extends('layouts.app', ['title' => 'DELIGHT | Меню в зале'])

@section('content')
    <section class="section container">
        <div class="section__body">
            <h1>
                Меню в зале
            </h1>
            @foreach($products as $product)
                <div>
                    <img src="/storage/menu/{{$product->img}}" alt="" class="product__image"
                         width="250" height="250" loading="lazy"
                    >
                    <p>{{$product->name}}</p>
                    <p>{{$product->description}}</p>
                </div>
            @endforeach
        </div>
    </section>
@endsection
