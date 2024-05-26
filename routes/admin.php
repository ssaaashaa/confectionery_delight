<?php

use Illuminate\Support\Facades\Route;

Route::middleware("guest:admin")->group(function () {
    Route::get('login', [\App\Http\Controllers\Admin\AuthController::class, 'index'])->name('login');
    Route::post('login_process', [\App\Http\Controllers\Admin\AuthController::class, 'login'])->name('login_process');
});


Route::middleware("auth:admin")->group(function () {
    Route::resource('feedback-requests', \App\Http\Controllers\Admin\FeedbackRequestController::class);
    Route::resource('admin', \App\Http\Controllers\Admin\AdminUsersController::class);
    Route::resource('presentation', \App\Http\Controllers\Admin\PresentationController::class);
    Route::resource('event-records', \App\Http\Controllers\Admin\EventRecordsController::class);
    Route::resource('tasting', \App\Http\Controllers\Admin\TastingController::class);
    Route::get('logout', [\App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');
});






