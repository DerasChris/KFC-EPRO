<?php

namespace App\Http\Controllers;

use App\Models\Orden;
use App\Models\Rol;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $rol = Rol::findOrFail($id);
        $card = $this->showCard($rol);
        $ingresos = $this->showIngresos();
        return view('pages.section.options', compact('rol', 'card', 'ingresos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function showCard(Rol $rol)
    {
        $estadoOrden = Orden::class;
        $card = [
            'title',
            'data',
            'img'
        ];
        switch ($rol->idRol) {
            case 1:
                $card['title'] = [
                    1 => 'ORDENES EN PROCESO',
                    2 => 'ORDENES EN ESPERA',
                ];
                $card['data'] = [
                    1 => $estadoOrden::where(['estado' => "En proceso"])->count(),
                    2 => $estadoOrden::where(['estado' => "Pendiente"])->count(),
                ];
                $card['img'] = [
                    1 => 'https://firebasestorage.googleapis.com/v0/b/pmkfc-52178.appspot.com/o/entrega-rapida.png?alt=media&token=d4b98dea-eee1-43cc-bd43-9179e016a70b',
                    2 => 'https://firebasestorage.googleapis.com/v0/b/pmkfc-52178.appspot.com/o/hora.png?alt=media&token=bb2af20b-0c77-43a1-92f9-84d1b20a6d44',
                ];
                break;
            case 2:
                $card['title'] = [
                    1 => 'ORDENES PENDIENTES',
                    2 => 'ORDENES ENTREGADAS',
                ];
                $card['data'] = [
                    1 => $estadoOrden::where(['estado' => "Completada"])->count(),
                    2 => $estadoOrden::where(['estado' => "Entregada"])->count(),
                ];
                $card['img'] = [
                    1 => 'https://firebasestorage.googleapis.com/v0/b/pmkfc-52178.appspot.com/o/hora.png?alt=media&token=bb2af20b-0c77-43a1-92f9-84d1b20a6d44',
                    2 => 'https://firebasestorage.googleapis.com/v0/b/pmkfc-52178.appspot.com/o/buena-resena.png?alt=media&token=1b2d8957-523a-4d0f-a515-b90892395bfa',
                ];
                break;
            case 4:
                $card['title'] = [
                    1 => 'TOTAL ENTREGADOS',
                    2 => 'TOTAL NO RETIRADOS',
                    3 => 'INGRESOS ESTIMADOS',
                ];
                $card['data'] = [
                    1 => $estadoOrden::where(['estado' => "Entregada"])->count(),
                    2 => $estadoOrden::where(['estado' => "Cancelada"])->count(),
                    3 => $estadoOrden::where(['estado' => "Entregada"])->sum('total'),
                ];
                $card['img'] = [
                    1 => 'https://firebasestorage.googleapis.com/v0/b/pmkfc-52178.appspot.com/o/buena-resena.png?alt=media&token=1b2d8957-523a-4d0f-a515-b90892395bfa',
                    2 => 'https://firebasestorage.googleapis.com/v0/b/pmkfc-52178.appspot.com/o/entrega-rapida.png?alt=media&token=d4b98dea-eee1-43cc-bd43-9179e016a70b',
                    3 => 'https://firebasestorage.googleapis.com/v0/b/pmkfc-52178.appspot.com/o/salario.png?alt=media&token=d8995bfc-777a-42ed-b301-58651a455a12'
                ];
                break;
        }
        return $card;
    }

    public function showIngresos()
    {
        $totalesPorFecha = Orden::select(DB::raw('DATE(created_at) as fecha'), DB::raw('COUNT(*) as cantidad'), DB::raw('SUM(total) as suma_total'))
            ->where('estado', 'Entregada')
            ->groupBy(DB::raw('DATE(created_at)'))
            ->get();
        $filasHTML = '';
        foreach ($totalesPorFecha as $total) {
            $fecha = date('d-M-Y', strtotime($total->fecha));
            $cantidad = $total->cantidad;
            $sumaTotal = $total->suma_total;
            $urlPDF = route('generarPDF',$total->fecha);

            $filasHTML .= "<tr>
                <td>{$fecha}</td>
                <td>{$cantidad}</td>
                <td>{$sumaTotal}</td>
                <td>
                    <a href='{$urlPDF}' target='_blank'>
                        <img src='https://firebasestorage.googleapis.com/v0/b/pmkfc-52178.appspot.com/o/imprimir.png?alt=media&token=5ad2f0cd-8ff4-4bda-a167-f7f3230d6992' class='icon icon-shape'>
                    </a>
                </td>
            </tr>";
        }
        return $filasHTML;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function edit(Rol $rol)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rol $rol)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rol $rol)
    {
        //
    }
}
