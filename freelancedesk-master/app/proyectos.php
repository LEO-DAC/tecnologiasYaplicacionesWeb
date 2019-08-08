<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class proyectos extends Model
{
    //
	
	protected $fillable = [
        'nombre','id_project_manager', 'id_cliente', 'fecha_inicio', 'fecha_fin', 'precio', 'status'
    ];
}
