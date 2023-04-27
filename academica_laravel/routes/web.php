<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\InscripcionController;

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

Route::controller(DocenteController::class) -> group(function(){
    Route::get('/docentes', 'index');
    Route::post('/docentes', 'store');
    Route::put('/docentes', 'update');
    Route::delete('/docentes', 'destroy');
});

Route::controller(MateriaController::class) -> group(function(){
    Route::get('/materias', 'index');
    Route::post('/materias', 'store');
    Route::put('/materias', 'update');
    Route::delete('/materias', 'destroy');
});

Route::controller(InscripcionController::class) -> group(function(){
    Route::get('/inscripciones', 'index');
    Route::post('/inscripciones', 'store');
    Route::put('/inscripciones', 'update');
    Route::delete('/inscripciones', 'destroy');
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
