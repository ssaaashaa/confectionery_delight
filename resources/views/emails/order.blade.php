<div>
    Здравствуйте, {{$name}}!
    {{$today}} вы оформили заказ в кондитерской &laquoDELIGHT&raquo.
</div>
<h3>Заказ №: {{ $orderID }}</h3>
@foreach($products as $product)
    <div>
        <b><p>{{$product->name}} ({{$product->count}})</p></b>
        <p>Количество: {{$product->quantity}} шт.</p>
        <p>Вкус: {{$product->biscuit_name}}</p>
        @if($product->fill_name == null)
            <p>Начинка: -</p>
        @else
            <p>Начинка: {{$product->fill_name}}</p>
        @endif
    </div>
@endforeach
<h3>Итого к оплате: {{ $orderPrice }} BYN</h3>
<h4>Дата готовности заказа: {{ $date }}</h4>
<p>Узнать о состоянии заказа можно по номеру +375(29)132-63-72 или в личном кабинете. Пароль: <b>{{ $password }}</b></p>
<h4>СПАСИБО ЗА ЗАКАЗ!<br>В БЛИЖАЙШЕЕ ВРЕМЯ С ВАМИ СВЯЖЕТСЯ АДМИНИСТРАТОР ДЛЯ ПОДТВЕРЖДЕНИЯ ЗАКАЗА</h4>




