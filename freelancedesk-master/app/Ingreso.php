<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    protected $fillable = [
        'id', 'nombre', 'detalle', 'cantidad', 'fecha', 'id_usuario', 'id_proyecto'
    ];
}
