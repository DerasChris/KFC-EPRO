<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $table = 'productos';
    protected $fillable = ['nombre', 'precio', 'imagen', 'stock'];

    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'menu_producto')->withPivot('cantidad')->withTimestamps();
    }

    public function ordenes()
    {
        return $this->belongsToMany(Orden::class, 'orden_producto')->withPivot('cantidad', 'precio')->withTimestamps();}}
