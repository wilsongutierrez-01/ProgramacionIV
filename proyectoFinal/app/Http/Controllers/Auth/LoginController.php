<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
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

        // $user = Socialite::driver('google')->user();

        // $userExists = User::where('external_id', $user->id)->where('external_auth', 'google')->exists();

        // if($userExists){
        //     Auth::login($userExists);
        // }else{
        //     $userNew = User::create([
        //         'name' => $user->name,
        //         'email' => $user->email,
        //         // 'password' => $user->password,
        //         'avatar' => $user->avatar,
        //         'external_id' => $user->id,
        //         'external_auth' => 'google',

        //     ]);
        //     Auth::login($userNew);
        // }

        return redirect('/dashboard');
        // dd($user);

        // Aquí puedes realizar las acciones necesarias con los datos del usuario

        // Por ejemplo, puedes autenticar al usuario en tu aplicación
        // utilizando el ID de correo electrónico único de Google

        // Si el usuario ya existe, inicia sesión con su cuenta
        // Si no existe, crea un nuevo usuario con los datos proporcionados por Google

        // Luego, redirige al usuario a la página de inicio de tu aplicación
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }

    public function redirectToFacebook()
{
    return Socialite::driver('facebook')->redirect();
}

public function handleFacebookCallback()
{
    $user = Socialite::driver('facebook')->user();

    $userExists = User::where('external_id', $user->id)->where('external_auth', 'facebook')->first();

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

    // Aquí puedes implementar la lógica para crear o autenticar al usuario en tu aplicación

    return redirect('/dashboard'); // Redirige al usuario a la página de inicio después del inicio de sesión exitoso
}
}
