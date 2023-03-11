<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/session', function () {
    return auth()->id() ? auth()->id() : -1;
});

Route::post('/logout', function () {
    Auth::logout();
    return response()->json(['msg' => 'Logged out']);
});

Route::get('/home/slides', [App\Http\Controllers\HomeController::class, 'getSlides']);

Route::get('/user/info', [App\Http\Controllers\UserController::class, 'getPersonalInfo']);

Route::get('/user/similar', [App\Http\Controllers\UserController::class, 'getSimilarUsers']);

Route::post('/messages', [App\Http\Controllers\ChatController::class, 'fetchMessages']);

Route::post('/messages/send', [App\Http\Controllers\ChatController::class, 'sendMessage']);
# Vue Routes

Route::get('/{any?}', [App\Http\Controllers\SPAController::class, 'index'])->where('any', '(.*)');