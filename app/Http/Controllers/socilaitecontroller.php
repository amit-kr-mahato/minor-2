<?php

namespace App\Http\Controllers;

// use Socialite;

use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class socilaitecontroller extends Controller
{
    public function Googlelogin()
    {
        return Socialite::driver('google')->redirect();
    }

    public function Googleauthentication()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();

            $user = User::firstOrCreate(
                ['email' => $googleUser->getEmail()],
                [
                    'name' => $googleUser->getName(),
                    'email_verified_at' => now(),
                    'password' => bcrypt(Str::random(16)),
                    'role' => 'user', // default role
                ]
            );

            Auth::login($user);

            // Redirect by role
            return match ($user->role) {
                'admin' => redirect()->route('admin.dashboard'),
                'businessowner' => redirect()->route('businessdashboard.dashboard'),
                default => redirect()->route('index'),
            };
        } catch (\Exception $e) {
            return redirect('/login')->withErrors(['google' => 'Google login failed.']);
        }
    }
}
