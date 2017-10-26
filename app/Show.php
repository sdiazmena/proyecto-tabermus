<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    //
    protected $table = 'shows';

    protected $filliable = [
    	'nombre', 'informacion', 'start', 'end', 'color', 'id_ciudad'
    ];
}
