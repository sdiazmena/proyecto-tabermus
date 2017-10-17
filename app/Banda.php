<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banda extends Model
{
    protected $table = "banda";

    protected $fillable = ['id', 'nombre', 'id_integrante', 'id_usuario', 'id_disco', 'id_ciudad'];

    public function usuario()
    {
    	return $this->belongsTo('App\User');
    }

}
