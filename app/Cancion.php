<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cancion extends Model
{
    //
    protected $table = "cancion";

    protected $fillable = ['id', 'titulo', 'id_lista','id_banda'];
}
