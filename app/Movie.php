<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model {
    protected $table = 'banda';
    protected $fillable = ['nombre', 'description'];
    protected $guarded = ['id'];
}
