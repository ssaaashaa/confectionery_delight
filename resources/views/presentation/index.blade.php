@extends('layouts.app', ['title' => 'DELIGHT | Презентация'])

@section('content')
    <section class="section container">
        <div class="section__body">

            <header class="section__header">
                <h2 class="section__title">
                    Презентация новых начинок
                </h2>
            </header>
            <div class="presentation-page">
                <div class="presentation-page__description">
                    <p>
                        В кондитерской DELIGHT состоится событие, полное вкуса, радости и невероятных открытий –
                        презентация новых начинок!
                    </p>
                    <p>
                        Шеф-кондитер предстанет перед гостями, чтобы представить свои последние шедевры, созданные с любовью
                        и мастерством.
                    </p>
                    <p>
                        После презентации настанет время для самой интересной части – дегустации, где гости
                        погрузятся во вкусы новых начинок, испытывая восторг и удовлетворение.
                    </p>
                    <div class="presentation-page__details">
                    <span>
                        Дата:
                    </span>
                        <span>
                        Стоимость входного билета:
                    </span>
                    </div>
                </div>


                <div class="presentation">
                    <form method="POST" action="{{route("presentation_process")}}" class="presentation__form">
                        @csrf

                        <div class="presentation__body">
                            <div class="tasting__field field">
                                <label class="field__label" for="name">Имя*</label>
                                <input name="name" class="field__input" id="name"
                                       required autocomplete="off"
                                       @auth("web") value="{{Auth::user()->name}}" @endauth
                                       placeholder="Имя">
                                @error('name')
                                <p>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="tasting__field field">
                                <label class="field__label" for="telephone">Номер телефона*</label>
                                <input name="telephone" class="field__input phone-mask" id="telephone"
                                       type="tel" required autocomplete="off"
                                       @auth("web") value="{{Auth::user()->telephone}}" @endauth
                                       placeholder="Номер телефона">
                                @error('telephone')
                                <p>{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="presentation__button button button--accent">
                            Забронировать место
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
