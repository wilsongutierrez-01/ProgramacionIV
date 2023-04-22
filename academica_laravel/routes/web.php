<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\DocenteController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::controller(AlumnoController::class) -> group (function(){
    Route::get('/alumnos', 'index');
    Route::post('/alumnos', 'store');
    Route::put('/alumnos', 'update');
    Route::delete('/alumnos', 'destroy');
});

// Route::apiResources([
//     'alumno' => AlumnoController::class,
// ]);

// Route::apiResources([
//     'docente' => DocenteController::class,
// ]);
// Route::apiResource([
//     'docente' => DocenteController::class,
// ]);
