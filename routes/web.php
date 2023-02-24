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

Route::as('front.')->group(function () {
    Route::get('/', [\App\Http\Controllers\Front\MainController::class, 'index'])->name('index');
    Route::post('/register', \App\Http\Controllers\Front\RegistrationController::class)->name('register');
    Route::as('page.')->prefix('page')->group(function () {
        Route::get('/{token}', [\App\Http\Controllers\Front\HashLinkController::class, 'page'])->name('index');
        Route::post('/{token}/experience-luck', [\App\Http\Controllers\Front\WinningController::class, 'experienceLuck'])->name('experienceLuck');
        Route::post('/{token}/generate-link', [\App\Http\Controllers\Front\HashLinkController::class, 'store'])->name('store');
        Route::post('/{token}/deactivate-link', [\App\Http\Controllers\Front\HashLinkController::class, 'deactivate'])->name('deactivate');
    });
});
