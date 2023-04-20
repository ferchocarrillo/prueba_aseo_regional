<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Rutascontroller;
use App\Http\Controllers\Clientescontroller;
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

Auth::routes();

Route::get('/', function () {
    return redirect()->route('login');
});

Route::resource('rutas', RutasController::class);
Route::resource('clientes', ClientesController::class);
Route::delete('/rutas/{id}', [
    \App\Http\Controllers\RutasController::class,
    'destroy',
])->name('rutas.destroy');

Route::post('/app/Models/Clientes', [
    'as' => 'Clientes',
    'uses' => 'ClientesController@coord',
]);

Route::post('clientes/urls', 'ClientesController@urls')->name('clientes.urls');
