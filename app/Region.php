<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table = "region";

    protected $fillable = ['id', 'nombre', 'id_usuario', 'id_ciudad', 'numero'];

    public function ciudad()
    {
    	return $this->hasMany('App\Ciudad');
    }
    public function user()
    {
    	return $this->hasMany('App\User');
    }

}
