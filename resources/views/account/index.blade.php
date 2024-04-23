@extends('layouts.app', ['title' => 'DELIGHT | Корзина'])

@section('content')
    <section class="section container">
        <div class="section__body">
            <h1>
                Личный кабинет
            </h1>
            @auth("web")
                <a href="{{route('logout')}}">
                    <button class="hero__button button">
                        Выйти
                    </button>
                </a>
                <h2>Личные данные</h2>
                <p>{{$user->name}}</p>
                <form>
                    <img src="/storage/users/{{$user->avatar}}" alt=""
                         width="150`" height="150" id="user_avatar" loading="lazy"
                    >
                    <br>
                    <label style="cursor: pointer" for="user_img">Изменить фото</label>
                    <input onchange="doAfterSelectImage(this)" type="file" style="display: none" id="user_img" name="avatar">
{{--                    --}}{{--                <label for="file">Выбрать фото</label>--}}
{{--                    <input name="image" id="load_avatar" type="file"></input>--}}
                    {{--                <button class="button" id="load_avatar">Обновить фото</button>--}}
                </form>
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
                <a href="{{route('login')}}">
                    <button class="hero__button button">
                        Войти
                    </button>
                </a>
            @endguest
        </div>
    </section>
    <script src="/js/account.js"></script>
@endsection
