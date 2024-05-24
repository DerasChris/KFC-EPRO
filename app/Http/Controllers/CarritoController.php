<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Mesa;
use App\Models\Orden;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CarritoController extends Controller
{
    public function agregarProductoAlCarrito(Request $request, $id)
    {
        $producto = Producto::find($id);
        $carrito = Session::get('carrito', ['productos' => [], 'menus' => [], 'total' => 0]);

        if (!isset($carrito['total'])) {
            $carrito['total'] = 0;
        }

        if (isset($carrito['productos'][$id])) {
            $carrito['productos'][$id]['cantidad']++;
        } else {
            $carrito['productos'][$id] = [
                "nombre" => $producto->nombre,
                "cantidad" => 1,
                "precio" => $producto->precio,
                "imagen" => $producto->imagen
            ];
        }

        $carrito['total'] += $producto->precio;

        Session::put('carrito', $carrito);
        return redirect()->back()->with('success', 'Producto agregado al carrito!');
    }

    public function agregarMenuAlCarrito(Request $request, $id)
    {
        $menu = Menu::find($id);
        $carrito = Session::get('carrito', ['productos' => [], 'menus' => [], 'total' => 0]);

        if (!isset($carrito['total'])) {
            $carrito['total'] = 0;
        }

        if (isset($carrito['menus'][$id])) {
            $carrito['menus'][$id]['cantidad']++;
        } else {
            $carrito['menus'][$id] = [
                "nombre" => $menu->nombre,
                "cantidad" => 1,
                "precio" => $menu->precio_estimado,
                "imagen" => $menu->imagen
            ];
        }

        $carrito['total'] += $menu->precio_estimado;

        Session::put('carrito', $carrito);
        return redirect()->back()->with('success', 'Menu agregado al carrito!');
    }

    public function verCarrito()
    {
        $carrito = Session::get('carrito', []);
    $total = 0;

    if (!empty($carrito['productos'])) {
        foreach ($carrito['productos'] as $producto) {
            $total += $producto['precio'] * $producto['cantidad'];
        }
    }

    if (!empty($carrito['menus'])) {
        foreach ($carrito['menus'] as $menu) {
            $total += $menu['precio'] * $menu['cantidad'];
        }
    }

    $carrito['total'] = $total;
    return view('carrito', compact('carrito'));
    }

    public function confirmarOrden(Request $request)
{
    $carrito = session()->get('carrito', []);
    $total = 0;

    if (!empty($carrito['productos'])) {
        foreach ($carrito['productos'] as $producto) {
            $total += $producto['precio'] * $producto['cantidad'];
        }
    }

    if (!empty($carrito['menus'])) {
        foreach ($carrito['menus'] as $menu) {
            $total += $menu['precio'] * $menu['cantidad'];
        }
    }

    $mesa = Mesa::find($request->mesa_id);

    $orden = Orden::create([
        'estado' => 'Confirmada',
        'total' => $total,
        'mesa_id' => 2,
    ]);

    if (isset($carrito['productos'])) {
        foreach ($carrito['productos'] as $id => $detalles) {
            $orden->productos()->attach($id, [
                'cantidad' => $detalles['cantidad'],
                'precio' => $detalles['precio'],
            ]);
        }
    }

    if (isset($carrito['menus'])) {
        foreach ($carrito['menus'] as $id => $detalles) {
            $orden->menus()->attach($id, [
                'cantidad' => $detalles['cantidad'],
                'precio' => $detalles['precio'],
            ]);
        }
    }

    session()->forget('carrito');
    return redirect()->route('ordenes.show', $orden->id)->with('success', 'Orden confirmada!');
}

}
