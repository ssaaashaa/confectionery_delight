@extends('layouts.app', ['title' => 'DELIGHT | Корзина'])

@section('content')
    <section class="section container">
        <header class="section__header section__header-start">
            <h2 class="section__title">
                Корзина товаров
            </h2>
        </header>
        <div class="section__body">
            @if(count($cart_products))
                <div class="cart">
                    <div class="cart__items">
                        <ul class="cart__list">
                            @foreach ($cart_products as $key => $product)
                                <li class="cart__item">
                                    <div class="cart-item">
                                        <img src="/storage/designs/{{$product['design']}}" alt=""
                                             class="cart-item__image"
                                             width="200" height="200" loading="lazy"
                                        >
                                        <div class="cart-item__body">
                                            <div class="cart-item__title">
                                                <span>
                                                    {{$product['name']}}
                                                </span>
                                            </div>
                                            <div class="cart-item__count">
                                                <div class="cart-item__pieces">
                                                    @if(array_key_exists('weight', $product))
                                                        <p>Ярусы: {{$product['pieces']}}</p>
                                                        <p>Вес: {{$product['weight']}}</p>
                                                    @else
                                                        <p>Количество: {{$product['pieces']}}</p>
                                                    @endif
                                                </div>


                                            </div>
                                            <div class="cart-item__taste">
                                        <span>
                                            Вкус: {{$product['biscuit']}}
                                        </span>
                                                <span>
                                            Начинка: {{$product['fill']}}
                                        </span>
                                            </div>
                                        </div>
                                        <div class="cart-item__price">
                                                    <p
                                                        id="{{$product['id']}}-price">{{round($product['price']*$product['quantity'], 2)}} BYN</p>
                                            <div class="cart-item__counter" id="counter">
                                                <button class="removeQunatity button--no-style" id="removeQunatity"
                                                        value="{{$product['id']}}">-
                                                </button>
                                                <span id='{{$product['id']}}-quantity'
                                                      class="cart-item__quantity">{{$product['quantity']}}</span>
                                                <button class="addQunatity button--no-style" id="addQunatity"
                                                        value="{{$product['id']}}">+
                                                </button>
                                            </div>
                                        </div>


                                        <button class="cross-button deleteFromCart " id="{{$product['id']}}">
                                            <span class="visually-hidden">Удалить</span>
                                        </button>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="order">
                        <form method="POST" action="{{route("order_process")}}" class="order__form" autocomplete="off">
                            @csrf

                            <div class="order__body">
                                @if(!(Auth::user()))

                                    <div class="order__field field">
                                        <input name="name" class="field__input" id="name"
                                               required autocomplete="off"
                                               readonly onfocus="this.removeAttribute('readonly');"
                                               @auth("web") value="{{Auth::user()->name}}" @endauth
                                               placeholder="Имя">
                                        @error('name')
                                        <p>{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="order__field field">
                                        <input name="telephone" class="field__input phone-mask" id="telephone"
                                               type="tel" required autocomplete="disabled"
                                               @auth("web") value="{{Auth::user()->telephone}}" @endauth
                                               placeholder="Номер телефона">
                                        @error('telephone')
                                        <p>{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="order__field field">
                                        <input name="email" class="field__input" id="email"
                                               type="email" required autocomplete="disabled"
                                               @auth("web") value="{{Auth::user()->email}}" @endauth
                                               placeholder="Ваш e-mail">
                                        @error('email')
                                        <p>{{ $message }}</p>
                                        @enderror
                                    </div>
                                @endif
                                <fieldset class="order__delivery-types radios">
                                    <legend class="radios__title visually-hidden">Способ доставки</legend>
                                    <label class="radios__item radio">
                                        <input
                                            class="radio__input visually-hidden"
                                            name="delivery-type"
                                            type="radio"
                                            value="Доставка"
                                            checked
                                        />
                                        <span class="radio__emulator"></span>
                                        <span class="radio__label">Доставка</span>
                                    </label>
                                    <label class="radios__item radio">
                                        <input
                                            class="radio__input visually-hidden"
                                            name="delivery-type"
                                            type="radio"
                                            value="Самвовывоз"
                                        />
                                        <span class="radio__emulator"></span>
                                        <span class="radio__label">Самовывоз</span>
                                    </label>
                                </fieldset>
                                <div class="order__field field" id="delivery_field">
                                    <input name="address" class="field__input"
                                           required autocomplete="disabled"
                                           placeholder="Адрес доставки">
                                </div>
                                <div id="delivery_address" class="visually-hidden">
                                        <p>
                                            Адрес самовывоза: г. Минск,<br>ул. Сиреневая, д. 33
                                        </p>
                                </div>
                                <div class="order__field field">
                                    <label class="field__label" for="date">Выберите дату получения заказа*</label>
                                    <input name="date" class="field__input" id="date"
                                           type="date" required autocomplete="off"
                                    placeholder="Дата">
                                    @error('date')
                                    <p>{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="order__field field">
                                    <label class="field__label" for="comment">Ваши пожелания</label>
                                    <textarea name="comment" class="field__input order__textarea" id="comment"
                                              placeholder="Напишите свои пожелания к заказу. Например, вы что-то не едите или хотите добавить. Мы все учтем. "></textarea>
                                </div>
                                <div class="order__total">
                                    <p id="cart_total" name="total_cost">Итого: <span>{{$cart_total}} BYN</span></p>
                                    @auth('web')
                                        @if($discount!=0)
                                            <span>*с учетом персональной скидки</span>
                                        @endif
                                        @if($orders_count === 0)
                                            <span>*с учетом скидки за первый заказ</span>
                                        @endif
                                    @endauth
                                </div>

                                <button type="submit" class="button order__button">Оформить заказ</button>

                            </div>
                        </form>
                    </div>
                </div>
            @else
                <p>В корзине еще нет товаров</p>
            @endif
        </div>
    </section>
    @include("layouts.partials.discount-banner")

    <script src="/js/cart.js"></script>
@endsection
