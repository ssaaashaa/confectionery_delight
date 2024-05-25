import './bootstrap.js';
// require('./bootstrap');
// import './menu.js';
$(".phone-mask").mask("+375 (99) 999-99-99");

$('.login-button').on('click', function ( ) {
    $('#dark-bg').removeClass('visually-hidden');
    $('body').addClass('overflow-hidden');
    $('.register').addClass('visually-hidden');
    $('.login').removeClass('visually-hidden');
    $('.forgot').addClass('visually-hidden');
})

$('.register-button').on('click', function ( ) {
    $('#dark-bg').removeClass('visually-hidden');
    $('body').addClass('overflow-hidden');
    $('.register').removeClass('visually-hidden');
    $('.login').addClass('visually-hidden');
})

$('.auth-close').on ('click', function () {
    $('body').removeClass('overflow-hidden');
    $('#dark-bg').addClass('visually-hidden');
    $('.register').addClass('visually-hidden');
    $('.login').addClass('visually-hidden');
})

$('.forgot-button').on('click', function () {
    $('.register').addClass('visually-hidden');
    $('.login').addClass('visually-hidden');
    $('.forgot').removeClass('visually-hidden');
})

