<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf_token" content="{{csrf_token()}}">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="/css/app.css"></link>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
</head>
<body class="page @if(count($errors))overflow-hidden @endif">
<header class="header">
    <div class="header__inner container">
        <a href="/" class="header__logo logo">
            <img src="/storage/img/logo.svg"
                 alt="DELIGHT"
                 class="logo__image"
                 width="120" height="auto" loading="lazy">
        </a>
        <nav class="header__menu">
            <ul class="header__menu-list hidden-tablet">
                <li class="header__menu-item">
                    <a href="{{route('home')}}#catalog" class="header__menu-link">Каталог</a>
                </li>
                <li class="header__menu-item">
                    <a href="{{route('menu')}}" class="header__menu-link">Меню в зале</a>
                </li>
                <li class="header__menu-item">
                    <a href="{{route('presentation.index')}}" class="header__menu-link">Презентация</a>
                </li>
                <li class="header__menu-item">
                    <a href="{{route('tasting.index')}}" class="header__menu-link">Дегустация</a>
                </li>
                <li class="header__menu-item">
                    <a href="{{route('about.index')}}" class="header__menu-link">О нас</a>
                </li>
                <li class="header__menu-item">
                    <a href="" class="header__menu-link">Контакты</a>
                </li>
            </ul>
        </nav>
        <div class="header__extra">
            <ul class="header__extra-list">
                <li class="header__extra-item header__extra-item--none">
                    <a href="" class="header__extra-link">
                        +375 (29) 132-63-72
                    </a>
                    <p>
                        с 9:00 до 21:00
                    </p>
                </li>
                <li class="header__extra-item">
                    <a href="{{route('cart.index')}}" class="header__extra-link">
                        <img src="/storage/img/basket.svg"
                             alt="DELIGHT"
                             class="menu-item__image"
                             width="21" height="22" loading="lazy">
                    </a>
                    <a @auth("web") href="{{route('account.index')}}" @endauth class="header__extra-link @guest() login-button @endguest">
                        <img src="/storage/img/user.svg"
                             alt="DELIGHT"
                             class="menu-item__image"
                             width="24" height="24" loading="lazy">
                    </a>
                </li>
            </ul>
        </div>
        <button class="button__burger-menu burger-button visible-tablet"
                type="button"
                onclick="tabletOverlay.showModal()">
            <span class="visually-hidden">Open navigation menu</span>
        </button>
    </div>
</header>
<main class="content">
    <div class="dark-bg @if(!$errors->any())visually-hidden @endif" id="dark-bg">
        @include("auth.login")
        @include("auth.register")
        @include("auth.forgot")
    </div>

    @yield('content')
</main>
<footer class="footer container">
    <div class="footer__inner">
        <div class="footer__navigation">
            <a href="/" class="footer__logo logo">
                <img src="/storage/img/logo.svg"
                     alt="DELIGHT"
                     class="logo__image"
                     width="100" height="auto" loading="lazy">
            </a>
            <nav class="footer__menu">
                <ul class="footer__menu-list">
                    <li class="footer__menu-item">
                        <a href="{{route('home')}}#catalog" class="footer__menu-link">
                            Каталог
                        </a>
                    </li>
                    <li class="footer__menu-item">
                        <a href="{{route('menu')}}" class="footer__menu-link">
                            Меню в зале
                        </a>
                    </li>
                    <li class="footer__menu-item">
                        <a href="{{route('presentation.index')}}" class="footer__menu-link">
                            Презентация
                        </a>
                    </li>
                    <li class="footer__menu-item">
                        <a href="{{route('tasting.index')}}" class="footer__menu-link">
                            Дегустация
                        </a>
                    </li>
                    <li class="footer__menu-item">
                        <a href="{{route('about.index')}}" class="footer__menu-link">
                            О нас
                        </a>
                    </li>
                    <li class="footer__menu-item">
                        <a href="" class="footer__menu-link">
                            Контакты
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="footer__body">
            <div class="footer__contacts">
                <address class="footer__contacts-body">
                    <p>E-mail: <a href="mailto: confectionery.delight@yandex.ru">confectionery.delight@yandex.ru</a></p>
                    <p>Телефон: <a href="tel:80291326372">+375 (29) 132-63-72</a></p>
                    <p>Адрес: г. Минск, ул. Сиреневая, д. 33</p>
                </address>
            </div>
            <div class="footer__extra">
                <p class="footer__copyright">
                    © <time datetime="2024">2024</time> DELIGHT. Все права защищены.
                </p>
            </div>
        </div>
    </div>
</footer>
<dialog class="mobile-overlay visible-tablet" id="tabletOverlay">
    <form action="" class="mobile-overlay__close-button-wrapper cross-button" method="dialog">
        <button class="mobile-overlay__close-button"
                type="submit"></button>
        <span class="visually-hidden">Close navigation menu</span>
        <div class="mobile-overlay__body">
            <ul class="mobile-overlay__list">
                <li class="mobile-overlay__item">
                    <a href="{{route('home')}}#catalog" class="mobile-overlay__link">Каталог</a>
                </li>
                <li class="mobile-overlay__item">
                    <a href="{{route('menu')}}" class="mobile-overlay__link">Меню в зале</a>
                </li>
                <li class="mobile-overlay__item">
                    <a href="{{route('presentation.index')}}" class="mobile-overlay__link">Презентация</a>
                </li>
                <li class="mobile-overlay__item">
                    <a href="{{route('tasting.index')}}" class="mobile-overlay__link">Дегустация</a>
                </li>
                <li class="mobile-overlay__item">
                    <a href="{{route('about.index')}}" class="mobile-overlay__link">О нас</a>
                </li>
                <li class="mobile-overlay__item">
                    <a href="" class="mobile-overlay__link">Контакты</a>
                </li>
            </ul>
        </div>
    </form>
</dialog>
<script src="/js/app.js"></script>
</body>
</html>

