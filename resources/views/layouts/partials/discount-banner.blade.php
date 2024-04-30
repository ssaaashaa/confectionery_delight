@auth("web")
    <section class="section container">
    <div class="presentation-banner banner">
        <div class="banner__inner">
            <div class="banner__body">
                <h3 class="banner__title">
                    Презентация тортов
                </h3>
                <div class="banner__description">
                    <p>
                        Презентация-дегустация тортов, которая пройдет в DELIGHT в дружественной и уютной атмосфере,
                        подарит
                        разнообразие и палитру вкусов.
                    </p>
                    <span>
                            21.07 в 17:00
                </span>
                    <span>
                    Входной билет - 60 BYN
                </span>
                </div>
                <a href="">
                    <button class="banner__button button">
                        Забронировать место
                    </button>
                </a>
            </div>
        </div>
    </div>
    </section>
@endauth
@guest()
    <section class="section container">
    <div class="discount-banner banner">
        <div class="banner__inner">
            <div class="banner__body">
                <h3 class="banner__title">
                    Бонусная программа
                </h3>
                <div class="banner__description">
                    <p>
                        Скидка 5 рублей на первый заказ, а также личная скидка покупателя, которая
                        увеличивается на 2.5% с каждым новым заказом!
                    </p>
                </div>
                <a href="{{route('account.index')}}">
                    <button class="banner__button button">
                        Зарегистрироваться
                    </button>
                </a>
            </div>
            <img src="/storage/img/discount-banner.svg" alt="" class="banner__image hidden-mobile"
                 loading="lazy">
        </div>
    </div>
    </section>
@endguest




