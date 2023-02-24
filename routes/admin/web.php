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

Route::as('admin.')->prefix('admin')->group(function () {
        Route::get('/', function () {
           return redirect()->route('admin.users.index');
        });
        Route::resource('/users', \App\Http\Controllers\Admin\UserController::class)->except('show');
    });
