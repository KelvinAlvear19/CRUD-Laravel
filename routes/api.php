<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/estudiantes', 'App\Http\Controllers\EstudianteController@index')->name('api.select'); // MOSTRAR TODOS

Route::post('/estudiantes', 'App\Http\Controllers\EstudianteController@store')->name('api.guardar'); // CREAR

Route::get('/estudiantesc', 'App\Http\Controllers\EstudianteController@create')->name('api.guardarc'); // CREAR

Route::put('/estudiantes/{est_cedula}', 'App\Http\Controllers\EstudianteController@update')->name('api.editar'); // Actualizar

Route::get('/estudiantes/{cedula}/estudiantes/{nombre}/estudiantes/{apellido}/estudiantes/{telefono}/estudiantes/{direccion}', 'App\Http\Controllers\EstudianteController@createupapi')->name('api.editarup'); // Actualizar

Route::delete('/estudiantes/{est_cedula}', 'App\Http\Controllers\EstudianteController@destroy')->name('api.delete'); // eliminar