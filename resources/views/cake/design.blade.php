@extends('layouts.app', ['title' => 'DELIGHT | Каталог '])

@section('content')
    <section class="section container">
        <div class="section__body">
            <h2>
                Примеры тортов
            </h2>
            <p>
                Выберете максимально подходящий дизайн торта, который вам
                понравился. Если вы не нашли ничего подходящего, вы можете прикрепить свой желаемый дизайн!
            </p>
            <button class="button">Загрузить свой дизайн</button>
            <br>
            <br>
            <div style="display: flex; width: 100%; justify-content: space-between">
                @foreach($designs as $design)
                    <div class="cake_design">
                        <img width="250" height="auto" loading="lazy" src="/storage/designs/{{$design->img}}" alt="">
                        <div class="radio_btn">
                            <input id="design-{{$design->id}}" type="radio" name="design">
                            <label class="selected_design" for="design-{{$design->id}}">✔</label>
                        </div>
                        <p>
                            {{$design->name}} {{$design->id}}
                        </p>
                    </div>
                @endforeach
            </div>
            <button class="button">Добавить в корзину</button>
        </div>
    </section>
@endsection
