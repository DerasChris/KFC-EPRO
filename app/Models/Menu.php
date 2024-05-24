<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menus';

    protected $fillable = ['nombre', 'precio_estimado', 'imagen', 'estado'];

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'menu_producto')->withPivot('cantidad')->withTimestamps();
    }

    public function ordenes()
    {
        return $this->belongsToMany(Orden::class, 'orden_menu')->withPivot('cantidad', 'precio')->withTimestamps();
    }
}
