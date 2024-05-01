@extends('layouts.app', ['title' => 'DELIGHT | Дегустация'])

@section('content')
    <section class="section container">
        <div class="section__body">
            <div class="tasting">
                <form method="POST" action="{{route("tasting_process")}}" class="tasting__form">
                    @csrf

                    <div class="tasting__body">
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
                    <button type="submit" class="tasting__button button button--accent">
                        Отправить
                    </button>
                </form>
            </div>
        </div>
    </section>
@endsection





