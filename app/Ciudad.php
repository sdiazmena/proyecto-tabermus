<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $table = "ciudad";

    protected $fillable = ['id', 'nombre', 'id_banda', 'id_region'];
    public static function ciudades($id)
    {
        return Ciudad::where('id_region','=',$id)->get();
    }

    public function region()
    {
    	return $this->belongsTo('App\Region');
    }
    public function banda()
    {
    	return $this->hasMany('App\Banda');
    }
}
