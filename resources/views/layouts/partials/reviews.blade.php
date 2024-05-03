<section class="section section--hidden-x container">
    <header class="section__header">
        <h2 class="section__title">
            Отзывы о нас
        </h2>
    </header>
    <div class="section__body">
        <div class="reviews">
            <ul class="reviews__list grid grid--3">
                @foreach($reviews as $review)
                    <li class="reviews__item">
                        <article class="review-card">
                            <img src="/storage/users/{{$review->avatar}}" alt="" class="review-card__image"
                                 width="150px" height="150px" loading="lazy">
                            <div class="review-card__body">
                                <h3 class="review-card__name">
                                    {{$review->name}}
                                </h3>
                                <div class="review-card__details">
                                    <p class="review-card__text">
                                        {{$review->review}}
                                    </p>
                                    <span class="review-card__date">
                                        {{date('d.m.Y', strtotime($review->created_at))}}
                                    </span>
                                </div>
                            </div>
                        </article>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
