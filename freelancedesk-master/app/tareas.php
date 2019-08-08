<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tareas extends Model
{
      protected $fillable=['id_proyecto','id_desarrollador','nombre','descripcion','status','monto'];

}
