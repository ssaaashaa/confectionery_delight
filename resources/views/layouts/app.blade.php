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
</head>
<body class="page">
<header class="header">
    <div class="header__inner container">
        <a href="/" class="header__logo logo">
            <img src="/storage/img/logo.svg"
                 alt="DELIGHT"
                 class="logo__image"
                 width="110" height="40" loading="lazy">
        </a>
        <nav class="header__menu">
            <ul class="header__menu-list hidden-mobile">
                <li class="header__menu-item">
                    <a href="{{route('home')}}" class="header__menu-link">Каталог</a>
                </li>
                <li class="header__menu-item">
                    <a href="{{route('menu')}}" class="header__menu-link">Меню в зале</a>
                </li>
                <li class="header__menu-item">
                    <a href="{{route('presentation.index')}}" class="header__menu-link">Презентация</a>
                </li>
                <li class="header__menu-item">
                    <a href="" class="header__menu-link">FAQ</a>
                </li>
                <li class="header__menu-item">
                    <a href="" class="header__menu-link">О нас</a>
                </li>
                <li class="header__menu-item">
                    <a href="" class="header__menu-link">Контакты</a>
                </li>
            </ul>
        </nav>
        <div class="header__extra">
            <ul class="header__menu-extra">
                <li class="header__menu-item">
                    <a href="" class="header__menu-link">
                        +375 (29)132-63-72
                    </a>
                    <p>
                        с 9:00 до 21:00
                    </p>
                </li>
                <li class="header__menu-item">
                    <a href="{{route('cart.index')}}" class="header__menu-link">
                        <img src="/storage/img/basket.svg"
                             alt="DELIGHT"
                             class="menu-item__image"
                             width="21" height="22" loading="lazy">
                    </a>
                </li>
                <li class="header__menu-item">
                    <a href="{{route('account.index')}}" class="header__menu-link">
                        <img src="/storage/img/user.svg"
                             alt="DELIGHT"
                             class="menu-item__image"
                             width="24" height="24" loading="lazy">
                    </a>
                </li>
            </ul>
        </div>
        <button class="button__burger-menu burger-button visible-mobile"
                type="button"
                onclick="mobileOverlay.showModal()">
            <span class="visually-hidden">Open navigation menu</span>
        </button>
    </div>
</header>
<main class="content">

    @yield('content')
</main>
<footer class="footer">

</footer>
<dialog class="mobile-overlay visible-mobile" id="mobileOverlay">
    <form action="" class="mobile-overlay__close-button-wrapper cross-button" method="dialog">
        <button class="mobile-overlay__close-button"
                type="submit"></button>
        <span class="visually-hidden">Close navigation menu</span>
        <div class="mobile-overlay__body">
            <ul class="mobile-overlay__list">
                <li class="mobile-overlay__item">
                    <a href="" class="mobile-overlay__link">Каталог</a>
                </li>
                <li class="mobile-overlay__item">
                    <a href="" class="mobile-overlay__link">Меню в зале</a>
                </li>
                <li class="mobile-overlay__item">
                    <a href="" class="mobile-overlay__link">Презентация</a>
                </li>
                <li class="mobile-overlay__item">
                    <a href="" class="mobile-overlay__link">FAQ</a>
                </li>
                <li class="mobile-overlay__item">
                    <a href="" class="mobile-overlay__link">О нас</a>
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

