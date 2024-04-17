@extends('layouts.app', ['title' => 'DELIGHT | Корзина'])

@section('content')
    <section class="section container">
        <div class="section__body">
            <h1>
                Корзина
            </h1>
            @if(count($cart_products))
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
            <form method="POST" action="{{route("order_process")}}">
                @csrf

                <p>Выберите дату, когда вам будет удобно забрать заказ: </p>
                <input name="date" type="date"/>
                {{--                    @error('date')--}}
                {{--                    <p class="text-red-500">{{ $message }}</p>--}}
                {{--                    @enderror--}}
                <br>
                <br>
                <p>Ваши пожелания</p>
                <textarea name="comment" style="width: 400px" placeholder="Напишите свои пожелания к заказу. Например, вы что-то не едите или хотите добавить. Мы все учтем. ">Напишите свои пожелания к заказу. Например, вы что-то не едите или хотите добавить.</textarea>
                <p id="cart_total" name="total_cost">Итого: <span>{{$cart_total}} BYN</span></p>
                <button type="submit" class="button">Оформить заказ</button>
                <br>
                <br>
            </form>
                @else
                <p>Корзина пуста</p>
            @endif

        </div>
    </section>
    <script src="/js/cart.js"></script>
@endsection
