@extends('layouts.app', ['title' => 'DELIGHT | Каталог '])

@section('content')
    <section class="section container">
        <div class="section__body">
            <h2>Торт на заказ</h2>
            <p>Хотите заказать по-настоящему уникальный торт? С помощью нашего конструктора Вы можете сделать его
                самостоятельно — нам остается только приготовить его Вам!</p>
            <div style="display: flex; flex-direction: column; align-items: center">
                <img style="opacity: 0.05" src="/storage/biscuits/snickers.png"
                     alt=""
                     class="tier"
                     width="120" height="50" loading="lazy">
                <img style="opacity: 0.05" src="/storage/biscuits/snickers.png"
                     alt=""
                     class="tier"
                     width="165" height="50" loading="lazy">
                <img style="opacity: 0.05" src="/storage/biscuits/snickers.png"
                     alt=""
                     class="tier"
                     width="205" height="auto" loading="lazy">
                <img src="/storage/biscuits/snickers.png"
                     alt=""
                     class="tier"
                     width="250" height="auto" loading="lazy">
                <img src="/storage/biscuits/plate.png"
                     alt=""
                     width="250" height="auto" loading="lazy">
            </div>
            <form>
                <br>
                <div>Количество ярусов</div>
                <br>
                <div>
                    <div class="radio_btn">
                        <input id="radio-1" value="1" type="radio" name="count" checked class="selected_count">
                        <label class="selected_count" for="radio-1">1</label>
                    </div>
                    <div class="radio_btn">
                        <input id="radio-2" value="2" type="radio" name="count" class="selected_count">
                        <label class="selected_count" for="radio-2">2</label>
                    </div>
                    <div class="radio_btn">
                        <input id="radio-3" value="3" type="radio" name="count" class="selected_count">
                        <label class="selected_count" for="radio-3">3</label>
                    </div>
                    <div class="radio_btn">
                        <input id="radio-4" value="4" type="radio" name="count" class="selected_count">
                        <label class="selected_count" for="radio-4">4</label>
                    </div>
                </div>
                <p>
                    Вес торта ~<span id="cake_price"></span> кг
                </p>

                <div>Вкус</div>
                <br>
                <div>
                    @foreach($biscuits as $biscuit)
                        <div class="radio_btn">
                            <input id="{{$biscuit->id}}" type="radio" name="biscuit" class="selected_biscuit"
                                   value="{{$biscuit->id}}">
                            <label for="{{$biscuit->id}}">{{$biscuit->name}}</label>
                        </div>
                    @endforeach
                </div>

                <div>Начинка</div>
                <br>
                <div>
                    @foreach($fills as $fill)
                        <div class="radio_btn">
                            <input id="fill-{{$fill->id}}" type="radio" name="fill" class="selected_fill" disabled
                                   value="{{$fill->id}}">
                            <label for="fill-{{$fill->id}}">{{$fill->name}}</label>
                        </div>
                    @endforeach
                </div>
            </form>
            <button class="button" id="addToCart" value="">Примеры тортов</span>&nbsp BYN</button>
        @include("tasting.index")
    </section>
    <script src="/js/cake.js"></script>
@endsection
