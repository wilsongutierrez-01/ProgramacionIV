<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\UserController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\UsuarioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*********************************************** */
// Controll all views
//******************************************** */
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function(){
    return view('dashboard');
});

// Route::get('/perfil', function(){
//     return view('perfil');
// });

Route::get('/perfil', [UserController::class, 'showProfile'])->name('perfil');


Route::get('/registrar', function(){
    return view('registrar');
});

Route::get('/conten1', function(){
    return view('contenido1');
});
Route::get('/conten2', function(){
    return view('contenido2');
});
Route::get('/conten3', function(){
    return view('contenido3');
});
Route::get('/juegos', function(){
    return view('juegos');
});

Route::get('/ePerfilKid', function(){
    return view('editarPerfilN');
});

//****************************************** */

// contoll user information



Route::get('/usuarios/{id}',[UsuarioController::class,'show'])->name('usuario.show');


//*************************** */

// /conten1

// Route::get('login/google', function () {
//     return Socialite::driver('google')->redirect();
// });

Route::controller(LoginController::class) -> group(function(){
    Route::get('login/google', 'redirectToGoogle');
    Route::get('google-callback', 'handleGoogleCallback');
    Route::get('/logout', 'logout');
    Route::get('login/facebook', 'redirectToFacebook');
    Route::get('facebook-callback', 'handleFacebookCallback');
});

// Route::get('login/google', 'Auth\LoginController@redirectToGoogle');
// Route::get('login/google/callback', 'Auth\LoginController@handleGoogleCallback');

