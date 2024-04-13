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
Route::post('/presentation_process', [\App\Http\Controllers\FeedbackRequestController::class, 'presentation'])->name('presentation_process');
Route::post('/tasting_process', [\App\Http\Controllers\FeedbackRequestController::class, 'tasting'])->name('tasting_process');

Route::get('/catalog-{product_category_id}', [\App\Http\Controllers\CatalogController::class, 'index'])->name('catalog.index');
Route::get('/catalog-{product_category_id}/{id}', [\App\Http\Controllers\CatalogController::class, 'show'])->name('catalog.show');
Route::get('/catalog-{product_category_id}/getFills/{id}', [\App\Http\Controllers\CatalogController::class, 'getFills'])->name('fills');

Route::middleware("auth")->group(function (){
    Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
});

Route::middleware("guest")->group(function (){
    Route::get('/login', [\App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login_process', [\App\Http\Controllers\AuthController::class, 'login'])->name('login_process');

    Route::get('/register', [\App\Http\Controllers\AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register_process', [\App\Http\Controllers\AuthController::class, 'register'])->name('register_process');

    Route::get('/forgot', [\App\Http\Controllers\AuthController::class, 'showForgotForm'])->name('forgot');
    Route::post('/forgot_process', [\App\Http\Controllers\AuthController::class, 'forgot'])->name('forgot_process');
});





