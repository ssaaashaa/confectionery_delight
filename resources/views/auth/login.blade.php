<div class="login
        @error('login')
        @if($message===null)visually-hidden
    @endif
    @enderror
     @error('forgot')
     @if($message)visually-hidden
@endif
@enderror">
    <button class="cross-button login__close auth-close">
        <span class="visually-hidden">Закрыть</span>
    </button>
    <div class="login__title">
        <h2>
            Вход
        </h2>
    </div>
    <form method="POST" action="{{ route("login_process") }}" class="login__form">
        @csrf

        <div class="order__field field">
            <input name="email" class="field__input"
                   type="email" required autocomplete="off"
                   placeholder="Ваш e-mail">
            @error('email')
            <p>{{ $message }}</p>
            @enderror
        </div>
        <div class="order__field field">
            <input name="password" class="field__input" id="password"
                   type="password" required autocomplete="disabled"
                   placeholder="Ваш пароль">
            <a class="login__forgot forgot-button">Забыли пароль?</a>
            @error('login')
            <p>{{ $message }}</p>
            @enderror
        </div>
        <button class="button login__button" type="submit">Войти</button>
    </form>
    <div class="login__register">
        Еще нет аккаунта? <a class="register-button"><span>Регистрация</span></a>
    </div>
</div>
