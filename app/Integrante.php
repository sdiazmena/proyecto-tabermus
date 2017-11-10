<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Integrante extends Model
{
    protected $table = "integrante";

    protected $fillable = ['id', 'id_banda','nombre'];
}
