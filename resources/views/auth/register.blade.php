<div class="register
  @error('login')
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
                   required autocomplete="off"
                   readonly onfocus="this.removeAttribute('readonly');"
                   placeholder="Имя">
            @error('name')
            <p>{{ $message }}</p>
            @enderror
        </div>
        <div class="order__field field">
            <input name="telephone" class="field__input phone-mask" id="telephone"
                   type="tel" required autocomplete="disabled"
                   placeholder="Номер телефона">
            @error('telephone')
            <p>{{ $message }}</p>
            @enderror
        </div>
        <div class="order__field field">
            <input name="email" class="field__input"
                   type="email" required autocomplete="disabled"
                   placeholder="Ваш e-mail">
            @error('email')
            <p>{{ $message }}</p>
            @enderror
        </div>
        <div class="order__field field">
            <input name="password" class="field__input"
                   type="password" required autocomplete="disabled"
                   placeholder="Ваш пароль">
            @error('password')
            <p>{{ $message }}</p>
            @enderror
        </div>
        <div class="order__field field">
            <input name="password_confirmation" class="field__input"
                   type="password" required autocomplete="disabled"
                   @auth("web") value="{{Auth::user()->email}}" @endauth
                   placeholder="Подтвердите пароль">
            @error('password_confirmation')
            <p>{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="button register__button">Зарегистрироваться</button>
    </form>
    <div class="register__login">
        Есть аккаунт? <a class="login-button"><span>Войти</span></a>
    </div>
</div>
