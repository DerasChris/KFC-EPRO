<?php

namespace App\Http\Controllers;

use App\Models\EncabezadoOrden;
use Illuminate\Http\Request;

class EncabezadoOrdenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$orden = EncabezadoOrden::where()->first();
        return view('pages.form_orden');
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
