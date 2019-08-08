<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pagos extends Model
{
     protected $fillable = ['id','id_beneficiario','id_benefactor','monto','descripcion','fecha'];
}
