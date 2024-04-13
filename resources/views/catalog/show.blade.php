@extends('layouts.app', ['title' => 'DELIGHT | Каталог '])

@section('content')
    <section class="section container">
        <div class="section__body">
            <h1>
                {{$product->name}}
            </h1>
            <img src="/storage/designs/{{$product->img}}" alt="" class="hero__image"
                 width="200" height="200" loading="lazy"
            >        </div>

        <a>
            <button class="button">Купить за {{$price*6*$product->ratio}} BYN</button>
        </a>
        <form>
        <div>Количество</div>
        <div>
            <div class="radio_btn">
                <input id="radio-6" type="radio" name="count" checked class="selected_count">
                <label class="selected_count selected_category" value='6' for="radio-6">6
                    шт.</label>
            </div>
            <div class="radio_btn">
                <input id="radio-9" type="radio" name="count" class="selected_count">
                <label class="selected_count selected_category" value='9' for="radio-9">9
                    шт.</label>
            </div>
            <div class="radio_btn">
                <input id="radio-12" type="radio" name="count" class="selected_count">
                <label class="selected_count selected_category" value='12' for="radio-12">12
                    шт.</label>
            </div>
        </div>

        <div>Вкус</div>
        <div>
            @foreach($biscuits as $biscuit)
                <div class="radio_btn">
                    <input id="{{$biscuit->id}}" type="radio" name="biscuit" class="selected_biscuit">
                    <label for="{{$biscuit->id}}">{{$biscuit->name}}</label>
                </div>
            @endforeach
        </div>

        <div>Начинка</div>
        <div>
            @foreach($fills as $fill)
                <div class="radio_btn">
                    <input id="fill-{{$fill->id}}" type="radio" name="fill" class="selected_fill" disabled>
                    <label  for="fill-{{$fill->id}}">{{$fill->name}}</label>
                </div>
            @endforeach
        </div>
        </form>
        @include("tasting.index", ["product"=>$product])
    </section>

@endsection

