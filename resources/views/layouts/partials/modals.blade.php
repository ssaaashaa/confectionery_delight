{{--@if (session('success'))--}}
<div class="modal @if (!session('success'))visually-hidden @endif">
    <button class="cross-button modal__close">
        <span class="visually-hidden">Закрыть</span>
    </button>
    <div class="modal__title">
        <h2>
            Спасибо за @if(session('success') === 'success_email')
                заказ!
            @elseзаявку!
            @endif
        </h2>
    </div>
    <div class="modal__form">
        <div class="order__field field">
            <p>
                В скором времени наш администратор свяжется с вами для подтверждения!
                @if(session('success') === 'success_email')
                    Данные о заказе высланы на почту.
                @endif
            </p>
        </div>
        <a href="{{route('home')}}">
            <button class="button modal__button">На главную</button>
        </a>
    </div>
</div>
<div class="modal modal--no-success @if (!session('nosuccess'))visually-hidden @endif">
    <div class="modal__form">
        <div class="order__field field field--no-style">
            <p style="text-align: center">
                @if(session('phone'))
                    Некорректный номер телефона!
                @else
                Вы уже оставляли заявку!
                @endif
            </p>
        </div>
        <button class="button modal__close modal__button">Закрыть</button>
    </div>
</div>
{{--@endif--}}
