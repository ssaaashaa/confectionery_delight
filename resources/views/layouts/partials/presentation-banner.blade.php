@auth("web")
    <section class="section container">
        <div class="presentation-banner banner">
            <div class="banner__inner">
                <div class="banner__body">
                    <h3 class="banner__title">
                        {{$presentation->title}}
                    </h3>
                    <div class="banner__description">
                        <p>
                            Презентация-дегустация начинок, которая пройдет в DELIGHT в дружественной и уютной атмосфере,
                            подарит
                            разнообразие и палитру вкусов.
                        </p>
                        <span>
                           {{date('d.m', strtotime($presentation->date))}} в {{$presentation->time}}
                </span>
                        <span>
                    Входной билет - {{$presentation->price}} BYN
                </span>
                    </div>
                    <a href="{{route('presentation.index')}}">
                        <button class="banner__button button">
                            Забронировать место
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endauth
