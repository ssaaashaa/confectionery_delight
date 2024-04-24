@extends('layouts.app', ['title' => 'DELIGHT | Корзина'])

@section('content')
    <section class="section container">
        <div class="section__body">
            <h1>
                Корзина
            </h1>
            @auth('web')
                <h3>Скидка: {{$discount}}%</h3>
            @endauth
            @if(count($cart_products))
                @foreach ($cart_products as $key => $product)
                    <div id="cart">
                        <img src="/storage/designs/{{$product['design']}}" alt="" class="hero__image"
                             width="200" height="200" loading="lazy"
                        >
                        @if(array_key_exists('weight', $product))
                            <p>Ярусы: {{$product['pieces']}}</p>
                            <p>Вес: {{$product['weight']}}</p>
                        @else
                            <p>Количество: {{$product['pieces']}}</p>
                        @endif
                        <div>
                            <div id='counter'>
                                <button class="removeQunatity" id="removeQunatity" value="{{$product['id']}}">-</button>
                                <span id='{{$product['id']}}-quantity'>{{$product['quantity']}}</span>
                                <button class="addQunatity" id="addQunatity" value="{{$product['id']}}">+</button>
                            </div>
                        </div>
                        <p>Цена: &nbsp<span
                                id="{{$product['id']}}-price">{{round($product['price']*$product['quantity'], 2)}}</span>&nbspBYN
                        </p>
                        <p>Вкус: {{$product['biscuit']}}</p>
                        <p>Начинка: {{$product['fill']}}</p>
                        <button class="button deleteFromCart" id="{{$product['id']}}">Удалить</button>
                        <hr style="height: 1px; fill: #EACAA1">
                    </div>
                @endforeach
                <form method="POST" action="{{route("order_process")}}">
                    @csrf

                    @if(!(Auth::user()))
                        <input name="name" type="text"
                               class="w-full h-12 border border-gray-800 rounded px-3 @error('name') border-red-500 @enderror"
                               placeholder="Ваше имя"
                        />

                        @error('name')
                        <p class="text-red-500">{{ $message }}</p>
                        @enderror
                        <br>
                        <br>
                        <input name="telephone" type="text"
                               class="w-full h-12 border border-gray-800 rounded px-3 @error('telephone') border-red-500 @enderror"
                               placeholder="Ваш телефон"
                        />
                        @error('telephone')
                        <p class="text-red-500">{{ $message }}</p>
                        @enderror
                        <br>
                        <br>
                        <input name="email" type="text"
                               class="w-full h-12 border border-gray-800 rounded px-3 @error('email') border-red-500 @enderror"
                               placeholder="Ваш e-mail"/>

                        @error('email')
                        <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    @endif

                    <br>
                    <br>
                    <p>Выберите дату, когда вам будет удобно забрать заказ: </p>
                    <input name="date" type="date"/>
                    <br>
                    <br>
                    <p>Ваши пожелания</p>
                    <textarea name="comment" style="width: 400px"
                              placeholder="Напишите свои пожелания к заказу. Например, вы что-то не едите или хотите добавить. Мы все учтем. ">Напишите свои пожелания к заказу. Например, вы что-то не едите или хотите добавить.</textarea>
                    <p id="cart_total" name="total_cost">Итого: <span>{{$cart_total}} BYN</span>
                    </p>
                    @auth('web')
                    @if($discount!=0)
                    <p>*с учетом персональной скидки</p>
                    @endif
                    @if($orders_count === 0)
                        <p>*с учетом скидки за первый заказ</p>
                    @endif
                    @endauth
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
