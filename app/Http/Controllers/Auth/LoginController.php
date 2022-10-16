<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Exception;
use Illuminate\Support\Facades\Log;
use Socialite;

class LoginController extends Controller
{
    public function redirectToLine()
    {
        return Socialite::driver('line')->redirect();
    }

    public function handleLineCallback()
    {
        try {
            $user = Socialite::driver('line')->user();
            $user = User::where('provider', 'line')->where('provider_id', $user->id)->first();
            if (!$user) {
                $user = new User();
                $user->name = $user->name;
                $user->email = $user->email;
                $user->avatar = $user->avatar;
                $user->save();
            }
            Auth::login($user);
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
        return redirect('/profile');
    }
}
