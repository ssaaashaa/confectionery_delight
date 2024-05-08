<div class="login @if(!$errors->any())visually-hidden"@endif>
    <button class="cross-button login__close auth-close">
        <span class="visually-hidden">Закрыть</span>
    </button>
    <div class="login__title">
                <h2>
                    Вход
                </h2>
    </div>
    <form method="POST" action="{{ route("login_process") }}" class="login__form" >
        @csrf

        <div class="order__field field">
            <input name="email" class="field__input" id="email"
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
            <a href="{{route("forgot")}}" class="login__forgot">Забыли пароль?</a>
            @error('password')
            <p>{{ $message }}</p>
            @enderror
        </div>
        <button class="button login__button" type="submit">Войти</button>
    </form>
    <div class="login__register">
        Еще нет аккаунта? <a class="register-button"><span>Регистрация</span></a>
    </div>
</div>
