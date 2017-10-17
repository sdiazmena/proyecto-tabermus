<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lirica extends Model
{
    protected $table = "lirica";

    protected $fillable = ['id', 'nombre'];


}