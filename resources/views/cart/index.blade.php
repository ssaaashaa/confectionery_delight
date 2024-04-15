@extends('layouts.app', ['title' => 'DELIGHT | Корзина'])

@section('content')
    <section class="section container">
        <div class="section__body">
            <h1>
                Корзина
            </h1>
            <p id="cart_total">Итого: {{$cart_total}} BYN</p>
        @foreach ($cart_products as $key => $product)
                <div id="cart">
                    <img src="/storage/designs/{{$product['design']}}" alt="" class="hero__image"
                         width="200" height="200" loading="lazy"
                    >
                    <p>Количество: {{$product['pieces']}} шт.</p>

                    <div>
                        <div id='counter'>
                            <button class="removeQunatity" id="removeQunatity" value="{{$product['id']}}">-</button>
                            <span id='{{$product['id']}}-quantity'>{{$product['quantity']}}</span>
                            <button class="addQunatity" id="addQunatity" value="{{$product['id']}}">+</button>
                        </div>
                    </div>
                    <p>Цена: &nbsp<span id="{{$product['id']}}-price">{{$product['price']*$product['quantity']}}</span>&nbspBYN</p>
                    <p>Вкус: {{$product['biscuit']}}</p>
                    <p>Начинка: {{$product['fill']}}</p>
                    <button class="button deleteFromCart" id="{{$product['id']}}">Удалить</button>
                    <hr style="height: 1px; fill: #EACAA1">
                </div>
            @endforeach

        </div>
    </section>
    <script src="/js/cart.js"></script>
@endsection
