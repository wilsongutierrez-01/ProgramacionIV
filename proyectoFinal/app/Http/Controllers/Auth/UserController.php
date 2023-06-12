<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;

// use Symfony\Component\HttpFoundation\Request;
// use SocialiteProviders\Google;

class UserController extends Controller
{
    public function showProfile()
    {
        //get data user
        $user = auth()->user();

        //return a view with data user
        return view('perfil')->with('user',$user);

    }

    public function showProfileInfantil()
    {
        //get data user
        $user = auth()->user();

        //return a view with data user
        return view('editarPerfilN')->with('user',$user);

    }
    public function showInfo()
    {
        //get data user
        $user = auth()->user();

        //return a view with data user
        return view('infantilPerfl')->with('userI',$user);

    }

}
