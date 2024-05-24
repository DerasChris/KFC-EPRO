<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    public function index()
    {
        $prods = Producto::all();
        return view('productos', compact('prods'));
    }
}
