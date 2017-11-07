<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Region;
use DB;
use Storage;
use Input;
use Validator;
use Auth;
use App\Genero;
use App\Lirica;
use App\Banda;
use App\User;

class FiltradoController extends Controller
{
    public function index()
    {
        $liricas = Lirica::orderBy('nombre', 'ASC')->pluck('nombre','id')->all();
        $generos = Genero::orderBy('nombre', 'ASC')->pluck('nombre','id')->all();
        $regiones = Region::orderBy('id', 'ASC')->pluck('nombre','id')->all();
        return view('filtrado')->with('regiones',$regiones)->with('liricas',$liricas)->with('generos',$generos);
    }
}
