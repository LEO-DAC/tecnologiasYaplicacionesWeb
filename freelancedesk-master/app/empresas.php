<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class empresas extends Model
{
    //
  protected $fillable = ['nombre','CP','pais','estado','ciudad','telefono','direccion'];
}
