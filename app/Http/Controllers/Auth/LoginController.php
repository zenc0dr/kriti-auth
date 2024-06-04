<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Перенаправление пользователя к Telegram для аутентификации.
     *
     * @return RedirectResponse
     */
    public function redirectToTelegram(): RedirectResponse
    {
        return Socialite::driver('telegram')->redirect();
    }

    /**
     * Обработка ответа от Telegram.
     *
     * @return RedirectResponse
     */
    public function handleTelegramCallback(): RedirectResponse
    {
        $telegramUser = Socialite::driver('telegram')->user();

        // Найти или создать пользователя
        $user = User::firstOrCreate([
            'telegram_id' => $telegramUser->id,
        ], [
            'name' => $telegramUser->nickname, // Используем nickname вместо name
        ]);

        // Аутентифицировать пользователя
        Auth::login($user);

        // Перенаправление на домашнюю страницу или другую страницу
        return redirect()->intended('/');
    }
}
