<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenMenu extends Model
{
    use HasFactory;

    protected $table = 'orden_menu';
    protected $fillable = ['id', 'orden_id', 'menu_id', 'cantidad', 'precio', 'created_at', 'updated_at'];

}
