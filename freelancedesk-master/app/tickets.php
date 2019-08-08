<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tickets extends Model
{
    //
    private $fillable = ['id_cliente','id_proyecto','descripcion','status','archivo','fecha'];
}
