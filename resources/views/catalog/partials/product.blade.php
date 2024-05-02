<li class="items__item" id="product-{{$product->design_category_id}}">
    <div class="item-card">
        <img src="/storage/designs/{{$product->img}}" alt="" class="item-card__image"
             width="100%" height="auto" loading="lazy"
        >
        <div class="item-card__body">
            <div class="item-card__title">
                    <span>
                    {{$product->name}}
                    </span>
            </div>
            <div class="item-card__buy">
                      <span>
                    от {{$category->price*6*$product->ratio}} BYN
                </span>
                <a href="{{route('catalog.show', [$product->product_category_id, $product->id])}}">
                    <button class="button item-card__button">Купить</button>
                </a>
            </div>
        </div>
    </div>
</li>


