<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\PublicacionController;

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

Route::controller(AlumnoController::class)->group(function (){
    Route::get('/alumnos', 'index');
    Route::get('/alumnos/ver/{id}', 'show');
    Route::get('/alumnos/crear', 'create');
    Route::post('/alumnos/crear',  'store');
    Route::get('/alumnos/editar/{id}', 'edit');
    Route::put('/alumnos/editar/{id}', 'update');
    Route::delete('/alumnos/eliminar/{id}',  'destroy');
});

Route::controller(PublicacionController::class)->group(function (){
    Route::get('/publicaciones', 'index');
    Route::get('/publicacioness/ver/{id}', 'show');
    Route::get('/publicacioness/ver/alumno/{id}', 'showPublicaciones');
    Route::get('/publicaciones/crear', 'create');
    Route::post('/publicaciones/crear',  'store');
    Route::get('/publicaciones/editar/{id}', 'edit');
    Route::put('/publicaciones/editar/{id}', 'update');
    Route::delete('/publicaciones/eliminar/{id}',  'destroy');
});
