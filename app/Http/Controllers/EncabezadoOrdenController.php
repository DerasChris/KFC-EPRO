<?php

namespace App\Http\Controllers;

use App\Models\EncabezadoOrden;
use App\Models\Orden;
use Illuminate\Http\Request;

class EncabezadoOrdenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idMesa)
    {
        $orden = Orden::max('id');
        $orden = $orden+1;

        return view('pages.form_orden', compact('idMesa', 'orden'));
    }

    public function guardarOrden($idMesa, Request $request)
    {
        if($request->isMethod('post')) {

            $nombre = Request()->input("cliente");

            $obj = new Orden();
            $obj->estado = 0; //guarda estado 0 que es creada :)
            $obj->mesa_id = $idMesa;
            $obj->total = 0;
            $obj->cliente = $nombre;
            $obj->save();
        }
        //luego cambiar este return a la vista de catálogo
        return redirect()->route('form.index', $idMesa);
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
     * @param  \App\Models\EncabezadoOrden  $orden
     * @return \Illuminate\Http\Response
     */
    public function show(EncabezadoOrden $orden)
    {
        //return view('components.calendar', compact('orden'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EncabezadoOrden  $orden
     * @return \Illuminate\Http\Response
     */
    public function edit(EncabezadoOrden $orden)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EncabezadoOrden  $orden
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EncabezadoOrden $orden)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EncabezadoOrden  $orden
     * @return \Illuminate\Http\Response
     */
    public function destroy(EncabezadoOrden $orden)
    {
        //
    }
}
