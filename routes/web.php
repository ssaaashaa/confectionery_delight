<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [\App\Http\Controllers\IndexController::class, 'index'])->name('home');

Route::get('/menu', [\App\Http\Controllers\MenuController::class, 'index'])->name('menu');
Route::get('/presentation', [\App\Http\Controllers\PresentationController::class, 'index'])->name('presentation.index');
Route::get('/tasting', [\App\Http\Controllers\TastingController::class, 'index'])->name('tasting.index');
Route::get('/about', [\App\Http\Controllers\AboutController::class, 'index'])->name('about.index');
Route::get('/contacts', [\App\Http\Controllers\ContactsController::class, 'index'])->name('contacts.index');
Route::post('/presentation_process', [\App\Http\Controllers\FeedbackRequestController::class, 'presentation'])->name('presentation_process');
Route::post('/tasting_process', [\App\Http\Controllers\FeedbackRequestController::class, 'tasting'])->name('tasting_process');

Route::get('/catalog-{product_category_id}', [\App\Http\Controllers\CatalogController::class, 'index'])->name('catalog.index');
Route::get('/catalog-{product_category_id}/{id}', [\App\Http\Controllers\CatalogController::class, 'show'])->name('catalog.show');
Route::get('/catalog-{product_category_id}/getFills/{id}', [\App\Http\Controllers\CatalogController::class, 'getFills'])->name('fills');
Route::get('/catalog-{product_category_id}/addToCart/{id}', [\App\Http\Controllers\CatalogController::class, 'addToCart'])->name('addToCart');
Route::get('/catalog-{product_category_id}/inCartOrNot/{id}', [\App\Http\Controllers\CatalogController::class, 'inCartOrNot'])->name('inCartOrNot');
Route::get('/catalog-{product_category_id}/total_price/{id}', [\App\Http\Controllers\CatalogController::class, 'total_price'])->name('total_price');

Route::get('/cake', [\App\Http\Controllers\CakeController::class, 'index'])->name('cake.index');
Route::get('/getFills/{id}', [\App\Http\Controllers\CakeController::class, 'getFills'])->name('cake-fills');
Route::get('/getTasteImg/{id}', [\App\Http\Controllers\CakeController::class, 'getTasteImg']);
Route::get('/addToCart/{id}', [\App\Http\Controllers\CakeController::class, 'addToCart']);
Route::get('/inCartOrNot/{id}', [\App\Http\Controllers\CakeController::class, 'inCartOrNot']);
Route::get('/total_price/{id}', [\App\Http\Controllers\CakeController::class, 'total_price']);

Route::get('/bento-box', [\App\Http\Controllers\BentoController::class, 'index'])->name('bento.index');
Route::get('/bentoGetFills/{id}', [\App\Http\Controllers\BentoController::class, 'getFills'])->name('bento-fills');
Route::get('/bentoAddToCart/{id}', [\App\Http\Controllers\BentoController::class, 'addToCart']);
Route::get('/bentoInCartOrNot/{id}', [\App\Http\Controllers\BentoController::class, 'inCartOrNot']);
Route::get('/bento_total_price/{id}', [\App\Http\Controllers\BentoController::class, 'total_price']);

Route::get('/cart', [\App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
Route::get('/cart/delete', [\App\Http\Controllers\CartController::class, 'delete'])->name('cart.delete');
Route::get('/cart/update', [\App\Http\Controllers\CartController::class, 'update'])->name('cart.update');
Route::post('/cart/order_process', [\App\Http\Controllers\CartController::class, 'order_process'])->name('order_process');


Route::middleware("auth")->group(function (){
    Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
    Route::get('/account', [\App\Http\Controllers\AccountController::class, 'index'])->name('account.index');
    Route::post('/review_process', [\App\Http\Controllers\AccountController::class, 'review'])->name('review_process');
    Route::post('/load_avatar', [\App\Http\Controllers\AccountController::class, 'load_avatar'])->name('load_avatar');
    Route::get('/account/update_user_info', [\App\Http\Controllers\AccountController::class, 'update_user_info'])->name('update_user_info');

});

Route::middleware("guest")->group(function (){
   // Route::get('/login', [\App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login_process', [\App\Http\Controllers\AuthController::class, 'login'])->name('login_process');

    //Route::get('/register', [\App\Http\Controllers\AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register_process', [\App\Http\Controllers\AuthController::class, 'register'])->name('register_process');

   // Route::get('/forgot', [\App\Http\Controllers\AuthController::class, 'showForgotForm'])->name('forgot');
    Route::post('/forgot_process', [\App\Http\Controllers\AuthController::class, 'forgot'])->name('forgot_process');
});






