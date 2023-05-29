<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class OAuthController extends Controller
{
    public function redirect() {
        return Socialite::driver('discord')->redirect();
    }

    public function callback() {
        $oauthUser = Socialite::driver('discord')->user();


        $user = User::create([
            'id' => $oauthUser->getId(),
            'name' => $oauthUser->getName(),
            'email' => $oauthUser->getEmail(),
            'avatar' => $oauthUser->getAvatar(),
        ]);

        auth()->login($user);

        return redirect('/')->with('message','Logged in with Discord');
    }
}
