<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EncabezadoOrden extends Model
{
    use HasFactory;

    protected $table = 'encabezadoorden';
    protected $primaryKey = 'idEncabezadoOrden';
    protected $fillable = [
        'idEstadoOrden',
        'idUsuario',
        'idMesa',
        'nombreCliente',
        'fechaOrden',
        'totalOrden'
    ];
}
