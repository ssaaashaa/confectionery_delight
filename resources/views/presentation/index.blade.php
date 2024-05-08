@extends('layouts.app', ['title' => 'DELIGHT | Презентация'])

@section('content')
    <section class="section container">
        <div class="section__body">
            <header class="section__header">
                <h2 class="section__title">
                    Запись на презентацию
                </h2>
            </header>
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
    </section>
@endsection
