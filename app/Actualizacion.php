<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actualizacion extends Model
{
    protected $table = "Actualizacion";

    protected $fillable = ['id', 'id_banda','detalles','id_show','id_ciudad'];
}
