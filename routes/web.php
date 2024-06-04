<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DebugController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('auth/telegram', [App\Http\Controllers\Auth\LoginController::class, 'redirectToTelegram']);
Route::get('auth/telegram/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleTelegramCallback']);
Route::get('debug', [App\Http\Controllers\DebugController::class, 'test']);
