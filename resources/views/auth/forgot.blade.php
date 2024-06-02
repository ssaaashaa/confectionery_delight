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
                <input name="forgot_email" class="field__input"
                       type="email" required autocomplete="off" title="some@some.some"
                       placeholder="Ваш e-mail">
                @error('forgot')
                <p>{{ $message }}</p>
                @enderror
            </div>
            <button class="button forgot__button" type="submit">Восстановить</button>

        </form>
    <div class="forgot__login">
        <a class="login-button">Вернуться назад</a>
    </div>
</div>
