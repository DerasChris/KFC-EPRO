<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    use HasFactory;

    protected $table = 'ordens';
    protected $fillable = ['estado', 'total', 'mesa_id'];

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'orden_producto')->withPivot('cantidad', 'precio')->withTimestamps();
    }

    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'orden_menu')->withPivot('cantidad', 'precio')->withTimestamps();
    }

    public function mesa()
    {
        return $this->belongsTo(Mesa::class);
    }
}
