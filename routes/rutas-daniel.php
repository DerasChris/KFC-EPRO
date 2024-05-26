<?php


use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\RolController;
use Illuminate\Support\Facades\Route;

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


//Route::view('/carrito_orden', 'carrito_orden');

Route::get('/carrito_orden', [CarritoController::class, 'index'])->name('carrito');
