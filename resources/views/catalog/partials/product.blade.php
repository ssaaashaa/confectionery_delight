<div>
    <img src="/storage/designs/{{$product->img}}" alt="" class="hero__image"
         width="200" height="200" loading="lazy"
    >
    <br>
    <p>{{$product->name}}</p>
    <p>от {{$category->price*6*$product->ratio}} BYN</p>
    <a href="{{route('catalog.show', [$product->product_category_id, $product->id])}}">
        <button class="button">Купить</button>
    </a>
    <br><br>

</div>
