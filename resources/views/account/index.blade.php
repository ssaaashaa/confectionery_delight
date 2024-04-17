@extends('layouts.app', ['title' => 'DELIGHT | Корзина'])

@section('content')
    <section class="section container">
        <div class="section__body">
            <h1>
                Личный кабинет
            </h1>
            @auth("web")
                <h2>Личные данные</h2>
                <p>{{$name}}</p>
                <h2>Мои заказы</h2>
                @foreach($orders as $order)
                    <p>Заказ №{{$order->id}}</p>
                    <p>Сумма заказа: {{$order->total_cost}}  </p>
                    <p>Статус заказа: {{$order->status}}  </p>
                    <hr style="height: 1px; fill: #EACAA1">
                @endforeach
                <a href="{{route('logout')}}">
                    <button class="hero__button button">
                        Выйти
                    </button>
                </a>
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
@endsection
