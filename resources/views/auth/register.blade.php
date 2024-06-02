<div class="register
  @error('login_email')
        @if($message) visually-hidden
@endif
@enderror
  @error('order_email')
        @if($message) visually-hidden
@endif
@enderror
  @error('order_telephone')
        @if($message) visually-hidden
@endif
@enderror
  @error('login_password')
        @if($message) visually-hidden
@endif
@enderror
 @error('forgot')
     @if($message)visually-hidden
@endif
@enderror">
    <button class="cross-button register__close auth-close">
        <span class="visually-hidden">Закрыть</span>
    </button>
    <div class="register__title">
        <h2>
            Регистрация
        </h2>
    </div>
    <form action="{{ route("register_process") }}" class="register__form" method="POST">
        @csrf

        <div class="order__field field">
            <input name="name" class="field__input" id="name"
                   autocomplete="off" type="text" required  maxlength="25" pattern=".{3,25}" title="Длина имени от 3 до 25 символов"
                   placeholder="Имя">
            @error('name')
            <p>{{ $message }}</p>
            @enderror
        </div>
        <div class="order__field field">
            <input name="telephone" class="field__input phone-mask" id="telephone"
                   type="tel" required autocomplete="disabled" title="+375 (25|29|33|44) xxx-xx-xx"
                   placeholder="Номер телефона">
            @error('telephone')
            <p>{{ $message }}</p>
            @enderror
        </div>
        <div class="order__field field">
            <input name="email" class="field__input"
                   type="email" required autocomplete="disabled" title="some@some.some"
                   placeholder="Ваш e-mail">
            @error('email')
            <p>{{ $message }}</p>
            @enderror
        </div>
        <div class="order__field field">
            <input name="password" class="field__input"
                   type="password" required autocomplete="disabled"
                   placeholder="Ваш пароль" min="8" max="20" pattern="(?=.*\d)(?=.*[a-zа-я])(?=.*[A-ZА-Я]).{8,20}" title="Пароль должен быть не менне 8 символов и содержать минимум одну цифру и букву в нижнем и верхнем регистрах">

        </div>
        <div class="order__field field">
            <input name="password_confirmation" class="field__input"
                   type="text" required autocomplete="disabled"
                   @auth("web") value="{{Auth::user()->email}}" @endauth
                   placeholder="Подтвердите пароль">
            @error('password')
            <p>{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="button register__button">Зарегистрироваться</button>
    </form>
    <div class="register__login">
        Есть аккаунт? <a class="login-button"><span>Войти</span></a>
    </div>
</div>
