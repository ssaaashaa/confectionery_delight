@extends('layouts.app', ['title' => 'DELIGHT | Дегустация'])

@section('content')
    <div class="section container">
        <div class="section__body">
            <div class="tasting-info">
                <div class="tasting-info__description">
                    <p>
                        Для того, чтобы подобрать идеальную начинку Вашего
                        будущего торта, мы предлагаем дегустационный сет, чтобы Вы смогли сделать уверенный выбор и
                        заранее знали
                        вкус Вашего торта.
                    </p>
                    <p>
                        Как правило, для дегустации предоставляется определенный и каждый
                        раз разный набор начинок. Если у Вас есть определенные пожелания -
                        мы обязательно учтем их.
                    </p>
                </div>
                <div class="tasting-info__time">
                    <img src="/storage/img/clock.svg"
                         alt=""
                         width="35" height="35" loading="lazy">
                    <p>
                        Наш администратор работает с 10 до 18.
                        <br>
                        Со вторника по субботу.
                    </p>
                </div>
                <span class="tasting-info__details">
                    Дегустация осуществляется по предварительной записи
                </span>
            </div>
            <header class="section__header">
                <h2 class="section__title">
                    Запись на дегустацию
                </h2>
            </header>
            <div class="tasting">
                <form method="POST" action="{{route("tasting_process")}}" class="tasting__form">
                    @csrf

                    <div class="tasting__body">
                        <div class="tasting__field field">
                            <label class="field__label" for="field_name">Имя*</label>
                            <input name="tasting_name" class="field__input" id="field_name"
                                   required autocomplete="off" type="text" maxlength="25" pattern=".{3,25}"
                                   title="Длина имени от 3 до 25 символов"
                                   @auth("web") value="{{Auth::user()->name}}" @endauth
                                   placeholder="Имя">
                            @error('name')
                            <p>{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="tasting__field field">
                            <label class="field__label" for="tasting_telephone">Номер телефона*</label>
                            <input name="tasting_telephone" title="+375 (25|29|33|44) xxx-xx-xx" class="field__input phone-mask" id="tasting_telephone"
                                   type="tel" required autocomplete="off"
                                   @auth("web") value="{{Auth::user()->telephone}}" @endauth
                                   placeholder="Номер телефона">
                            <p>{{session('phone')}}</p>
                        </div>
                    </div>
                    <button type="submit" class="tasting__button button button--accent">
                        Отправить
                    </button>
                </form>
            </div>
        </div>
    </div>
    <script src="/js/field_name.js"></script>
@endsection





