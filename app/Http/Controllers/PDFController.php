<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\DB;
use App\Models\OrdenMenu;

class PDFController extends Controller
{
    public function generatePDF($fecha)
    {
        $arrVenta = OrdenMenu::select(
            'ordens.id as id',
            'orden_menu.cantidad as cantidad',
            'orden_menu.precio as precio',
            'ordens.total as total',
            'menus.nombre as menu_nombre',
            'ordens.created_at as created_at'
        )
        ->join('ordens', 'orden_menu.orden_id', '=', 'ordens.id')
        ->join('menus', 'orden_menu.menu_id', '=', 'menus.id')
        ->where('ordens.estado', 'Entregada')
        ->whereDate('ordens.created_at', $fecha)
        ->get();
        $total = 0;
        // Imprimir el resultado para depuración
        //dd($arrVenta);
        $filasHTML = '';
        foreach ($arrVenta as $venta) {
            $total += $venta->total;
            $no =  $venta->id;
            $cantidad =  $venta->cantidad;
            $precio =  $venta->precio;
            $total = $venta->total;
            $menuNombre =$venta->menu_nombre;
            $filasHTML .= "<tr>
                    <td>{$no}</td>
                    <td>{$cantidad}</td>
                    <td>{$menuNombre}</td>
                    <td>{$precio}</td>
                    <td>{$total}</td>
                </tr>";
        }
        $filasHTML .= "
            <tr colspan=3>
                <td>Total de Ingresos Estimados</td>
                <td>{$total}</td>
            </tr>
        ";
        $data = [
            'title' => 'DETALLE DE INGRESOS ESTIMADOS',
            'fecha' => date('F j, Y', strtotime($fecha)),
            'arrVenta' => $filasHTML,
        ];

        $pdf = PDF::loadView('pages.pdf', $data);

        return $pdf->stream('document.pdf');
    }
}
