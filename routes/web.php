<?php

use App\Http\Controllers\dependeciascontroller;
use App\Http\Controllers\documentoscontroller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ObjetosController;
use App\Http\Controllers\ParametroController;
use App\Http\Controllers\PreguntaController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\tipodoccontroller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
   config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('usuarios',UsuarioController::class)->names('usuarios');
    Route::resource('roles',RolesController::class)->names('roles');
    Route::resource('parametros',ParametroController::class)->names('parametros');
    Route::resource('objetos',ObjetosController::class)->names('objetos');
    Route::resource('preguntas',PreguntaController::class)->names('Pregunta');
    Route::resource('digitalizar',documentoscontroller::class)->names('digitalizar');
    Route::resource('tipodoc',tipodoccontroller::class)->names('tipodoc');
    Route::resource('dependencias',dependeciascontroller::class)->names('dependencias');
    
    Route::get('bitacora','App\Http\Controllers\BitacoraController@index')->name('bitacora');
});

// rutas sin configuracion de jetstream 
// Route::middleware(['auth:sanctum','verified'])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
    
//     Route::resource('usuarios','UsuarioController'::class)->names('usuarios');
//     Route::resource('roles','RolesController'::class)->names('roles');
//     Route::resource('parametros','ParametroController'::class)->names('parametros');
//     Route::resource('objetos','ObjetosController'::class)->names('objetos');
//     Route::resource('preguntas','PreguntaController'::class)->names('Pregunta');
//     Route::get('bitacora','App\Http\Controllers\BitacoraController@index')->name('bitacora');
//  });