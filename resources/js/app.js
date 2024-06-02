import './bootstrap.js';
// require('./bootstrap');
// import './menu.js';
$(".phone-mask").mask("+375 (99) 999-99-99");

$('.login-button').on('click', function ( ) {
    $('.dark-bg').removeClass('visually-hidden');
    $('body').addClass('overflow-hidden');
    $('.register').addClass('visually-hidden');
    $('.register__form p').remove();
    $('.register__form')[0].reset();
    $('.login').removeClass('visually-hidden');
    $('.forgot').addClass('visually-hidden');
    $('.forgot__form p').remove();
    $('.forgot__form')[0].reset();
})

$('.register-button').on('click', function ( ) {
    $('.dark-bg').removeClass('visually-hidden');
    $('body').addClass('overflow-hidden');
    $('.register').removeClass('visually-hidden');
    $('.login').addClass('visually-hidden');
    $('.login__form p').remove();
    $('.login__form')[0].reset();
})

$('.auth-close').on ('click', function () {
    $('body').removeClass('overflow-hidden');
    $('.dark-bg').addClass('visually-hidden');
    $('.register').addClass('visually-hidden');
    $('.register__form p').remove();
    $('.register__form')[0].reset();
    $('.login').addClass('visually-hidden');
    $('.login__form p').remove();
    $('.login__form')[0].reset();
})

$('.forgot-button').on('click', function () {
    $('.register').addClass('visually-hidden');
    $('.register__form p').remove();
    $('.register__form')[0].reset();
    $('.login').addClass('visually-hidden');
    $('.login__form p').remove();
    $('.login__form')[0].reset();
    $('.forgot').removeClass('visually-hidden');
})

$('.modal__close').on ('click', function () {
    $('.dark-bg').addClass('visually-hidden');
    $('.modal').addClass('visually-hidden');
})

// Получаем элемент текстового поля
var name = document.getElementById("name");

// Добавляем обработчик события ввода
name.addEventListener("input", function (e) {
    // При вводе текста запускаем функцию толькоLettersSpacesDashes
    name.value = onlyLettersSpacesDashes(name.value);
});

function onlyLettersSpacesDashes(e) {
    // Допускаются только буквы, пробелы и тире
    var regex = /[^a-zA-Zа-яА-Я-]/g;

    // Заменяем все недопустимые символы на пустую строку
    var result = e.replace(regex, "");

    // Возвращаем замененный результат
    return result;
}



