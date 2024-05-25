<div class="forgot
 @error('forgot')
     @if($message===null)visually-hidden
@endif
@enderror">

    <div class="forgot__title">
        <h2>
            Восстановление пароля
        </h2>
    </div>
        <form class="forgot__form" method="POST" action="{{ route("forgot_process") }}">
            @csrf

            <div class="order__field field">
                <input name="email" class="field__input" id="email"
                       type="email" required autocomplete="off"
                       placeholder="Ваш e-mail">
                @error('forgot')
                <p>{{ $message }}</p>
                @enderror
            </div>
            <button class="button forgot__button" type="submit">Восстановить</button>

        </form>
    <div class="forgot__login">
        <a class="login-button">Вспомнил пароль</a>
    </div>
</div>
