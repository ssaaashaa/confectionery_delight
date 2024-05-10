@extends('layouts.app', ['title' => 'DELIGHT | Корзина'])

@section('content')
    <section class="section container">
        <div class="section__body">
            <div class="account">
                <div class="account__buttons">
                    <button class="account__button button-account button-account--focused">
                        Личные данные
                    </button>
                    <button class="account__button button-account">
                        Мои заказы
                    </button>
                    <a href="{{route('logout')}}" class="account__exit-button">
                        <button class="button button--no-style">
                            Выйти
                        </button>
                    </a>
                </div>
                @auth("web")
                    <div class="account__data">
                        <div class="account__image-data">
                            <img src="/storage/users/{{$user->avatar}}" alt=""
                                 class="account__image"
                                 width="150`" height="150" id="user_avatar" loading="lazy"
                            >
                            <div class="account__change-image-button">
                                <label style="cursor: pointer" for="load_avatar">Изменить фото</label>
                                <input type="file" style="display: none" id="load_avatar" name="avatar">
                            </div>
                        </div>
                        <form action="" class="account__form">
                            <div class="account__fields">
                                <div class="account__field field">
                                    <input name="new_name" class="field__input"
                                           required autocomplete="off"
                                           readonly onfocus="this.removeAttribute('readonly');"
                                           @auth("web") value="{{Auth::user()->name}}" @endauth
                                           placeholder="Имя">
                                    @error('name')
                                    <p>{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="account__field field">
                                    <input name="new_telephone" class="field__input phone-mask"
                                           type="tel" required autocomplete="disabled"
                                           @auth("web") value="{{Auth::user()->telephone}}" @endauth
                                           placeholder="Номер телефона">
                                    @error('telephone')
                                    <p>{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="account__field field">
                                    <input name="new_email" class="field__input"
                                           type="email" required autocomplete="disabled"
                                           @auth("web") value="{{Auth::user()->email}}" @endauth
                                           placeholder="Ваш e-mail">
                                    @error('email')
                                    <p>{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <button id="save_user_info" class="button">
                                Сохранить изменения
                            </button>
                        </form>
                        <div class="account__discount">
                            <span>
                                Ваша персональная скидка: {{$discount}} %
                            </span>
                            <p>
                                *скидка зависит от количества выполненных заказов
                            </p>
                        </div>
                    </div>
                @endauth
            </div>
            @auth("web")

                <br>

                <h2>Мои заказы</h2>
                @foreach($orders as $order)
                    <h3>Заказ №{{$order->id}}</h3>
                    <p>Дата заказа: {{date('d.m.Y', strtotime($order->created_at))}}</p>
                    <p>Статус: {{$order->status}}  </p>
                    @foreach($order->products as $product)
                        <img src="/storage/designs/{{$product->img}}" alt="" class="hero__image"
                             width="200" height="200" loading="lazy"
                        >
                        <p>{{$product->name}} ({{$product->count}})</p>
                        <p>Количество: {{$product->quantity}}</p>
                        <p>Вкус: {{$product->biscuit_name}}</p>
                        <p>Начинка: {{$product->fill_name}}</p>
                    @endforeach
                    <b><p>Итого: {{$order->total_cost}} BYN</p></b>
                    @if($order->status === 'Выполнен' && $order->count_review===0)
                        <form action="{{route("review_process")}}" method="POST">
                            @csrf

                            <textarea name="review" style="width: 400px; height: 40px"
                                      placeholder="Оставьте отзыв на заказ"></textarea>
                            @error('review')
                            <p class="text-red-500">{{ $message }}</p>
                            @enderror
                            <br>
                            <button type="submit" value="{{$order->id}}" name="order_id" class="button">Отправить
                            </button>
                        </form>
                    @endif
                    <hr style="height: 1px; fill: #EACAA1">
                @endforeach

            @endauth
            @guest("web")
                <button class="hero__button button login-button">
                    Войти
                </button>
            @endguest
        </div>
    </section>
    <script src="/js/account.js"></script>
@endsection
