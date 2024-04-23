@extends('layouts.app', ['title' => 'DELIGHT | Каталог '])

@section('content')
    <section class="section container">
        <div class="section__body">
            <h1>
                Подарочный бенто-бокс
            </h1>
            <p>
                Необычный и вкусный подарок для детей и взрослых на день рождения или корпоратив!
            </p>
            <img src="/storage/designs/{{$image->img}}" alt="" class="hero__image"
                 width="200" height="200" loading="lazy"
            >        </div>

        <br>
        <button class="button"  value="{{$image->id}}" id="addToCart">Купить за &nbsp<span id="price">{{$price}}</span>&nbsp BYN</button>
        <form>
            <br>
            <div>Вес торта</div>
            <br>
            <div>
                <div class="radio_btn">
                    <input id="radio-1" value="400" type="radio" name="count" checked class="selected_count">
                    <label class="selected_count"  for="radio-1">400 гр</label>
                </div>
                <div class="radio_btn">
                    <input id="radio-2" value="800" type="radio" name="count" class="selected_count">
                    <label class="selected_count"  for="radio-2">800 гр</label>
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
    </section>
    <script src="/js/bento.js"></script>
@endsection

