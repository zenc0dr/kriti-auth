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

        $user = User::firstOrCreate([
            'telegram_id' => $telegramUser->id,
        ], [
            'name' => $telegramUser->nickname, # Используем nickname вместо name
            'email' => $telegramUser->email ?? null,   # Telegram не всегда предоставляет email
        ]);

        Auth::login($user);

        return redirect()->intended('/');
    }
}
