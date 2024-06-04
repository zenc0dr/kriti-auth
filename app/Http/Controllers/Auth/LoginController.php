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

        # Найти или создать пользователя
        $user = User::firstOrCreate([
            'telegram_id' => $telegramUser->id,
        ], [
            'name' => $telegramUser->name,
            'email' => $telegramUser->email, # Telegram не всегда предоставляет email, можно убрать поле, если оно необязательно
            # Другие необходимые поля
        ]);

        # Аутентифицировать пользователя
        Auth::login($user);

        # Перенаправление на домашнюю страницу или другую страницу
        return redirect()->intended('/');
    }
}
