<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function redirectToTelegram()
    {
        return Socialite::driver('telegram')->redirect();
    }

    public function handleTelegramCallback()
    {
        $telegramUser = Socialite::driver('telegram')->user();

        // Найти или создать пользователя
        $user = User::firstOrCreate([
            'telegram_id' => $telegramUser->id,
        ], [
            'name' => $telegramUser->nickname, // Используем nickname вместо name
            #'email' => $telegramUser->email,   // Telegram не всегда предоставляет email, можно убрать поле, если оно необязательно
        ]);

        // Аутентифицировать пользователя
        Auth::login($user);

        // Перенаправление на домашнюю страницу или другую страницу
        return redirect()->intended('/');
    }
}
