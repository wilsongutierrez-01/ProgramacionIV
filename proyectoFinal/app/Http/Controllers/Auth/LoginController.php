<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;

// use Symfony\Component\HttpFoundation\Request;
// use SocialiteProviders\Google;

class LoginController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')
            ->with(['prompt' => 'select_account'])
            ->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        $userExists = User::where('external_id', $user->id)->where('external_auth', 'google')->first();

        global $infoUser;
        $infoUser = $userExists;
        if ($userExists) {
            Auth::login($userExists);
        } else {
            $userNew = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'avatar' => $user->avatar,
                'external_id' => $user->id,
                'external_auth' => 'google',
            ]);
            Auth::login($userNew);
        }

        return view('dashboard')->with('user', $userExists);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
        // Auth::logout();

        // return redirect('/');
    }

    public function redirectToFacebook()
{

    return Socialite::driver('facebook')->redirect();
}

public function handleFacebookCallback()

{
    $user = Socialite::driver('facebook')->user();
    dd($user);



    // $userExists = User::where('external_id', $user->id)->where('external_auth', 'facebook')->first();

    // if ($userExists) {
    //     Auth::login($userExists);
    // } else {
    //     $userNew = User::create([
    //         'name' => $user->name,
    //         'email' => $user->email,
    //         'avatar' => $user->avatar,
    //         'external_id' => $user->id,
    //         'external_auth' => 'google',
    //     ]);
    //     Auth::login($userNew);
    // }

    // // Aquí puedes implementar la lógica para crear o autenticar al usuario en tu aplicación

    // return redirect('/dashboard'); // Redirige al usuario a la página de inicio después del inicio de sesión exitoso
}
}
