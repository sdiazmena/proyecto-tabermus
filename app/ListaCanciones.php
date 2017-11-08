<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListaCanciones extends Model
{
    //
    protected $table = "lista_canciones";

    protected $fillable = ['id', 'id_disco', 'id_cancion'];
}
