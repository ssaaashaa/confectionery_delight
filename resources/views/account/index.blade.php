@extends('layouts.app', ['title' => 'DELIGHT | Корзина'])

@section('content')
    <section class="section container">
        <div class="section__body">
            <h1>
                Личный кабинет
            </h1>
            @auth("web")
                <h2>Личные данные</h2>
                <img src="/storage/users/{{$user->avatar}}" alt=""
                     width="150`" height="150" id="user_avatar" loading="lazy"
                >
                <br>
                <label style="cursor: pointer" for="load_avatar">Изменить фото</label>
                <input type="file" style="display: none" id="load_avatar" name="avatar">
                <br>
                <input name="name" type="text"
                       class="w-full h-12 border border-gray-800 rounded px-3 @error('name') border-red-500 @enderror"
                       placeholder="Имя"
                       value="{{Auth::user()->name}}"
                />

                @error('name')
                <p class="text-red-500">{{ $message }}</p>
                @enderror
                <br>
                <input name="email" type="text"
                       class="w-full h-12 border border-gray-800 rounded px-3 @error('email') border-red-500 @enderror"
                       placeholder="e-mail"
                       value="{{Auth::user()->email}}"
                />

                @error('email')
                <p class="text-red-500">{{ $message }}</p>
                @enderror
                <br>
                <input name="telephone" type="text"
                       class="w-full h-12 border border-gray-800 rounded px-3 @error('telephone') border-red-500 @enderror"
                       placeholder="Телефон"
                       value="{{Auth::user()->telephone}}"
                />

                @error('telephone')
                <p class="text-red-500">{{ $message }}</p>
                @enderror
                <br>
                <button id="save_user_info" class="button">
                    Сохранить изменения
                </button>
            <h3>
                Ваша персональная скидка: {{$discount}} %
            </h3>
                <br>
                <a href="{{route('logout')}}">
                    <button class="hero__button button">
                        Выйти
                    </button>
                </a>
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
