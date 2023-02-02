<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function redirectToProvider($provider){
        return Socialite::driver($provider)->redirect();

    }

    public function handleProviderCallback($provider){
        $socialiteUser = Socialite::driver($provider)->user();
        $user = User::updateOrCreate([
            'provider' => $provider,
            'provider_id' => $socialiteUser->getId()
        ], [
            'name' => $socialiteUser->getName(),
            'email' => $socialiteUser->getEmail(),
        ]);
        // dd($user);
        Auth::login($user);

        return redirect('/dashboard');
    }
}
