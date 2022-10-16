<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
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
            $providerUser = Socialite::driver('line')->user();
            $user = User::where('provider', 'line')->where('provider_id', $providerUser->id)->first();
            if (!$user) {
                $user = new User();
                $user->name = $providerUser->name;
                $user->email = $providerUser->email;
                $user->avatar = $providerUser->avatar;
                $user->provider = 'line';
                $user->provider_id = $providerUser->id;
                $user->save();
            }
            Auth::login($user);
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
        return redirect('/profile');
    }
}
