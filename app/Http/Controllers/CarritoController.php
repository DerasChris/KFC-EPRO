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
    
        // Obtener el ID de la orden de la sesión
        $ordenId = session()->get('orden');
    
        // Calcula el nuevo total de la orden
        $total = 0;
        foreach ($carrito['productos'] ?? [] as $producto) {
            $total += $producto['precio'] * $producto['cantidad'];
        }
        foreach ($carrito['menus'] ?? [] as $menu) {
            $total += $menu['precio'] * $menu['cantidad'];
        }
    
        // Buscar la orden en la base de datos por el ID de la sesión
        $orden = Orden::find($ordenId);
    
        // Si no se encuentra la orden, redirigir con un mensaje de error
        if (!$orden) {
            return redirect()->back()->with('error', 'No se encontró la orden para confirmar.');
        }
    
        // Actualizar el estado y el total de la orden
        $orden->estado = 'Pendiente';
        $orden->total = $total;
        $orden->save();
    
        // Asociar los productos y menús del carrito a la orden
        $orden->productos()->sync([]);
        foreach ($carrito['productos'] ?? [] as $id => $detalles) {
            $orden->productos()->attach($id, [
                'cantidad' => $detalles['cantidad'],
                'precio' => $detalles['precio'],
            ]);
        }
        $orden->menus()->sync([]);
        foreach ($carrito['menus'] ?? [] as $id => $detalles) {
            $orden->menus()->attach($id, [
                'cantidad' => $detalles['cantidad'],
                'precio' => $detalles['precio'],
            ]);
        }
    
        // Limpiar el carrito
        session()->forget('carrito');
    
        return redirect()->route('carrito.ver', $orden->id)->with('success', 'Orden confirmada!');
    }

    public function eliminar($id)
    {
        // Obtener el carrito de la sesión
        $carrito = Session::get('carrito', []);

        // Verificar si el producto existe en el carrito
        if (isset($carrito['productos'][$id])) {
            // Eliminar el producto del carrito
            unset($carrito['productos'][$id]);

            // Actualizar el carrito en la sesión
            Session::put('carrito', $carrito);
        }

        // Redirigir de vuelta al carrito
        return redirect()->back()->with('Deleted', 'Producto eliminado del carrito');
    }

    public function eliminarMenu($id)
    {
        // Obtener el carrito de la sesión
        $carrito = Session::get('carrito', []);

        // Verificar si el producto existe en el carrito
        if (isset($carrito['menus'][$id])) {
            // Eliminar el producto del carrito
            unset($carrito['menus'][$id]);

            // Actualizar el carrito en la sesión
            Session::put('carrito', $carrito);
        }

        // Redirigir de vuelta al carrito
        return redirect()->back()->with('Deleted', 'Producto eliminado del carrito');
    }

}
