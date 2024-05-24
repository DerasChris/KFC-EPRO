<?php


use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\EncabezadoOrdenController;
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

// RUTA DEL DASHBOARD
Route::get('/dashboard/{id}', [RolController::class, 'index']);

Route::get('form_orden', [EncabezadoOrdenController::class, 'index']);
