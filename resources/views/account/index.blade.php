@extends('layouts.app', ['title' => 'DELIGHT | Личный кабинет'])

@section('content')
    <section class="section section--hidden-x container">
        <div class="section__body">
            <div class="account">
                <div class="account__buttons">
                    <button class="account__button button-account @if(!session('phone'))button-account--focused @endif" id="user-orders">
                        Мои заказы
                    </button>
                    <button class="account__button button-account @if(session('phone'))button-account--focused @endif" id="personal-data">
                        Личные данные
                    </button>
                </div>
                @auth("web")
                    <div class="account__data @if(!session('phone')) visually-hidden @endif">
                        <div class="account__user-data">
                            <div class="account__image-data">
                                <div class="account__image">
                                    <img src="/storage/users/{{$user->avatar}}" alt=""
                                         id="user_avatar" loading="lazy"
                                    >
                                </div>
                                <div class="account__change-image-button">
                                    <label style="cursor: pointer" for="load_avatar">Изменить фото</label>
                                    <input type="file" style="display: none" id="load_avatar" name="avatar">
                                </div>
                            </div>
                            <form action="{{route('update_user_info')}}" class="account__form" method="POST">
                                @csrf
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
                                               type="tel" required autocomplete="disabled" title="+375 (25|29|33|44) xxx-xx-xx"
                                               @auth("web") value="{{Auth::user()->telephone}}" @endauth
                                               placeholder="Номер телефона">
                                        <p>{{session('phone')}}</p>
                                    </div>
                                    <div class="account__field field">
                                        <input name="new_email" class="field__input"
                                               type="email" required autocomplete="disabled"
                                               @auth("web") value="{{Auth::user()->email}}" @endauth
                                               placeholder="Ваш e-mail">
                                        <p>{{session('email')}}</p>
                                    </div>
                                </div>
                                <button id="save_user_info" class="button">
                                    Сохранить изменения
                                </button>
                            </form>
                        </div>
                        <div class="account__user-discount">
                            <div class="account__discount">
                                <div class="account__discount-text">
                                      <span>
                                Ваша персональная скидка:
                                      </span>
                                    <span class="account__discount-size">
                                        {{$discount}} %
                                    </span>
                                </div>
                                <p>
                                    *скидка зависит от количества выполненных заказов
                                </p>
                            </div>
                            <a href="{{route('logout')}}" class="account__exit-button">
                                <button class="button button--no-style">
                                    Выйти
                                </button>
                            </a>
                        </div>
                    </div>
                @endauth
                @auth("web")
                    <div class="account__orders user-orders @if(session('phone')) visually-hidden @endif">
                        <ul class="user-orders__list">
                            @foreach($orders as $order)
                                <li class="user-orders__item">
                                    <details class="user-orders__accordion">
                                        <summary class="user-orders__accordion-header">
                                            <div class="user-orders__accordion-title">
                                       <span>
                                            Заказ №{{$order->id}}
                                       </span>
                                                <span>{{$order->total_cost}} BYN</span>
                                                <span class="user-orders__accordion-indicator"></span>

                                            </div>

                                            <div class="user-orders__accordion-details--order">
                                                <span>Статус: {{$order->status}}  </span>
                                                <span>Дата готовности заказа: {{date('d.m.Y', strtotime($order->date))}}</span>
                                                @if($order->status === 'Выполнен' && $order->count_review===0)
                                                    <button
                                                        class="button button--no-style user-orders__accordion-button"
                                                        value="{{$order->id}}">Оставить отзыв
                                                    </button>
                                                @endif
                                            </div>
                                        </summary>
                                        <div class="user-orders__accordion-body">
                                            <ul class="user-orders__accordion-list grid grid--5">
                                                @foreach($order->products as $product)
                                                    <li class="user-orders__accordion-item">
                                                        <img src="/storage/designs/{{$product->img}}" alt=""
                                                             class="user-orders__accordion-image"
                                                             width="200" height="200" loading="lazy"
                                                        >
                                                        <div class="user-orders__accordion-details">
                                                            <span>{{$product->name}} ({{$product->count}})</span>
                                                            <span>Количество: {{$product->quantity}}</span>
                                                            <span>Вкус: {{$product->biscuit_name}}</span>
                                                            <span>Начинка: {{$product->fill_name}}</span>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </details>
                                    @if($order->status === 'Выполнен' && $order->count_review===0)
                                        <div class="review visually-hidden" id="review-form-{{$order->id}}">
                                            <button class="cross-button review__close auth-close">
                                                <span class="visually-hidden">Закрыть</span>
                                            </button>
                                            <div class="review__title">
                                                <h2>
                                                    Как вам заказ?
                                                </h2>
                                            </div>
                                            <form action="{{route("review_process")}}" method="POST"
                                                  class="review__form">
                                                @csrf
                                                <div class="review__form-field field">
                                                  <textarea name="review" class="field__input" required
                                                            placeholder="Оставьте отзыв на заказ"></textarea>
                                                </div>
                                                @error('review')
                                                <p class="text-red-500">{{ $message }}</p>
                                                @enderror
                                                <button type="submit" value="{{$order->id}}" name="order_id"
                                                        class="button">
                                                    Отправить
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endauth
            </div>
        </div>
    </section>
    <script src="/js/account.js"></script>
@endsection
