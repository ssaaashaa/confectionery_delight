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

<br>
     <button class="button" id="addToCart" value="{{$product->id}}">Купить за &nbsp<span id="count">{{ $price*$product->ratio}}</span>&nbsp BYN</button>


        <form>
            <br>
            <div>Количество</div>
            <br>
        <div>
            <div class="radio_btn">
                <input id="radio-6" value="6" type="radio" name="count" checked class="selected_count">
                <label class="selected_count"  for="radio-6">6
                    шт.</label>
            </div>
            <div class="radio_btn">
                <input id="radio-9" value="9" type="radio" name="count" class="selected_count">
                <label class="selected_count"  for="radio-9">9
                    шт.</label>
            </div>
            <div class="radio_btn">
                <input id="radio-12" value="12" type="radio" name="count" class="selected_count">
                <label class="selected_count"  for="radio-12">12
                    шт.</label>
            </div>
        </div>

        <div>Вкус</div>
            <br>
        <div>
            @foreach($biscuits as $biscuit)
                <div class="radio_btn">
                    <input id="{{$biscuit->id}}" type="radio" name="biscuit" class="selected_biscuit" value="{{$biscuit->id}}">
                    <label for="{{$biscuit->id}}">{{$biscuit->name}}</label>
                </div>
            @endforeach
        </div>

        <div>Начинка</div>
            <br>
        <div>
            @foreach($fills as $fill)
                <div class="radio_btn">
                    <input id="fill-{{$fill->id}}" type="radio" name="fill" class="selected_fill" disabled value="{{$fill->id}}">
                    <label  for="fill-{{$fill->id}}">{{$fill->name}}</label>
                </div>
            @endforeach
        </div>
        </form>
        @include("tasting.index")
    </section>
    <script src="/js/product.js"></script>
@endsection

