<div class="login
        @error('login_email')
        @if($message===null)visually-hidden
    @endif
    @enderror
     @error('login_password')
        @if($message===null)visually-hidden
    @endif
    @enderror

{{--            @if (!session('nologin'))--}}
{{--            visually-hidden--}}
{{--            @endif--}}

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
            <input name="login_email" class="field__input"
                   type="email" required autocomplete="off"
                   placeholder="Ваш e-mail">
            @error('login_email')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="order__field field">
            <input name="login_password" class="field__input"
                   type="password" required autocomplete="disabled"
                   placeholder="Ваш пароль">
            @error('login_password')
            <p class="error"> {{ $message }}</p>
            @enderror
            <a class="login__forgot forgot-button">Забыли пароль?</a>
                    </div>
        <button class="button login__button" type="submit">Войти</button>
    </form>
    <div class="login__register">
        Еще нет аккаунта? <a class="register-button"><span>Регистрация</span></a>
    </div>
</div>
