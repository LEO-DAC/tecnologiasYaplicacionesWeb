<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class incidencias extends Model
{
    //
  protected $fillable = ['id_proyecto','nombre','status','descripcion'];
}
