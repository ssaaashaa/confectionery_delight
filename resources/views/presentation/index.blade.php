@extends('layouts.app', ['title' => 'DELIGHT | Презентация'])

@section('content')
    <section class="section  container">
        <div class="section__body">

            <header class="section__header">
                <h2 class="section__title">
                    Презентация новых начинок
                </h2>
            </header>
            <div class="presentation-page">
                <div class="presentation-page__description section--hidden-x">
                    <p>
                        {{$presentation->description}}
                    </p>
                    <div class="presentation-page__details">
                    <span>
                        Дата: {{date('d.m.Y', strtotime($presentation->date))}}
                    </span>
                        <span>
                        Стоимость входного билета: {{$presentation->price}}
                    </span>
                    </div>
                    <div class="presentation-page__info">
                        <p>
                            Количество мест ограничено - спешите занять свое и оставляйте заявку!
                            <br>
                            *в случае, если места закончатся - не расстраивайтесь, встретимся на следующей презентации.
                        </p>
                    </div>
                    <div class="presentation-gallery">
                        <ul class="presentation-gallery__list grid grid--4">
                            <li class="presentation-gallery__item">
                                <img src="/storage/img/delicious-dessert-restaurant.png" alt=""
                                     class="presentation-gallery__image"
                                     width="200px" height="200px" loading="lazy"></li>
                            <li class="presentation-gallery__item">
                                <img src="/storage/img/festive-sweet-buffet.png" alt=""
                                     class="presentation-gallery__image"
                                     width="200px" height="200px" loading="lazy">
                            </li>
                            <li class="presentation-gallery__item">
                                <img src="/storage/img/friends-looking-menu.png" alt=""
                                     class="presentation-gallery__image"
                                     width="200px" height="200px" loading="lazy">
                            </li>
                            <li class="presentation-gallery__item">
                                <img src="/storage/img/Mask group.png" alt="" class="presentation-gallery__image"
                                     width="200px" height="200px" loading="lazy">
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="presentation presentation-page__form">
                    <form method="POST" action="{{route("presentation_process")}}" class="presentation__form">
                        @csrf

                        <div class="presentation__body">
                            <div class="tasting__field field">
                                <label class="field__label" for="field_name">Имя*</label>
                                <input name="presentation_name" class="field__input"  id="field_name"
                                       required autocomplete="off" type="text" maxlength="25" pattern=".{3,25}" title="Длина имени от 3 до 25 символов"
                                       @auth("web") value="{{Auth::user()->name}}" @endauth
                                       placeholder="Имя">
                                @error('name')
                                <p>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="tasting__field field">
                                <label class="field__label" for="presentation_telephone">Номер телефона*</label>
                                <input name="presentation_telephone" class="field__input phone-mask" id="presentation_telephone"
                                       type="tel" required autocomplete="off" title="+375 (25|29|33|44) xxx-xx-xx"
                                       @auth("web") value="{{Auth::user()->telephone}}" @endauth
                                       placeholder="Номер телефона">
                                <p>{{session('phone')}}</p>
                            </div>
                        <button type="submit" class="presentation__button button button--accent">
                            Забронировать место
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </section>
    <script src="/js/field_name.js"></script>
@endsection
