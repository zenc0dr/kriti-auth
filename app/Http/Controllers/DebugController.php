<?php

namespace App\Http\Controllers;

use Socialite;

class DebugController extends Controller
{
    public function test() {
        dd(
            Socialite::driver('telegram')->redirect();
        );
    }
}
