<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ReservaController;

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
 
// Ruta que devuelve todas las respuestas para poder ser consumidas
Route::get('/reservas', [ReservaController::class, 'getReservas'])->name('reservas');

// Ruta que permite obtener una reserva por medio de una criteria
Route::get('/reserva/{criteria}', [ReservaController::class, 'getReserva'])->name('reserva');

// Ruta que permite descargar todas las reservas en un fichero json
Route::get('/export-reservas-json', [ReservaController::class, 'exportReservasFormatJson'])->name('export-reservas-json');