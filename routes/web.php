<?php

use App\Http\Controllers\EncabezadoOrdenController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ProductosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolController;
use Illuminate\Support\Facades\Auth;
use Laravel\Jetstream\Rules\Role;

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
    return view('auth.login');
});

Route::middleware([
   'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        $user = Auth::user();
        

        if ($user) {
            // Verificar si el rol existe y es un número
            if (isset($user->role)) {
                if ($user->role == 1) {
                    return redirect()->route('d-role', ['id' => 1]);
                } elseif ($user->role == 2) {
                    return redirect()->route('d-role', ['id' => 2]);
                } elseif ($user->role == 4) {
                    return redirect()->route('d-role', ['id' => 4]);
                } else {
                    return view('dashboard_default');
                }
            } else {
                // Si no hay un rol definido en el usuario
                dd("No role found");
                return view('dashboard_default');
            }
        } else {
            // Si no hay un usuario autenticado
            return view('dashboard_default');
        }
    })->name('dashboard');

    Route::get('/dashboard/{id}', [RolController::class, 'index'])->name('d-role');
});

Route::get('/cliente/productos/individuales', [ProductosController::class, 'index'])->name('prodsIndividuales');
Route::get('/cliente/productos/combos', [MenuController::class, 'index'])->name('prodsCombos');

Route::post('orden/jefe/{estado?}', [RolController::class, 'updateOrdenEstadoJefe'])->name('updateOrdenJefe.index');

Route::post('orden/caja/{estado?}', [RolController::class, 'updateOrdenEstadoCaja'])->name('updateOrdenCaja.index');

Route::get('form_orden/{idMesa}', [EncabezadoOrdenController::class, 'index'])->name('form.index');
Route::post('guardar_orden/{idMesa}', [EncabezadoOrdenController::class, 'guardarOrden'])->name('form.guardar');

Route::get('/carrito', [CarritoController::class, 'verCarrito'])->name('carrito.ver');
Route::post('/carrito/producto/{id}', [CarritoController::class, 'agregarProductoAlCarrito'])->name('carrito.agregarProducto');
Route::post('/carrito/menu/{id}', [CarritoController::class, 'agregarMenuAlCarrito'])->name('carrito.agregarMenu');
Route::post('/carrito/confirmar', [CarritoController::class, 'confirmarOrden'])->name('carrito.confirmar');
Route::delete('/carrito/producto/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminarProd');
Route::delete('/carrito/menu/{id}', [CarritoController::class, 'eliminarMenu'])->name('carrito.eliminarMenu');



$data = [];
Route::get('/generate-pdf/{fecha}', [PDFController::class, 'generatePDF'])->name('generarPDF');