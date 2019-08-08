<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usuarios_proyectos extends Model
{
    protected $fillable=['id_proyecto','id_usuario','id_tipo','status','comentarios'];
}
