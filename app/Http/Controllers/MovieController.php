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
use App\Movie as Movie;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        $liricas = Lirica::orderBy('nombre', 'ASC')->pluck('nombre','id')->all();
        $generos = Genero::orderBy('nombre', 'ASC')->pluck('nombre','id')->all();
        $regiones = Region::orderBy('id', 'ASC')->pluck('nombre','id')->all();
        return \View::make('list',compact('movies'))->with('regiones',$regiones)->with('liricas',$liricas)->with('generos',$generos);
    }

    public function store(Request $request)
    {
        $movie = new Movie;
        $movie->nombre = $request->nombre;
        $movie->description = $request->description;
        $movie->save();
        return redirect('movie');

    }
    public function search(Request $request){
        $movies = Movie::where('nombre','like','%'.$request->name.'%')->get();
        $liricas = Lirica::orderBy('nombre', 'ASC')->pluck('nombre','id')->all();
        $generos = Genero::orderBy('nombre', 'ASC')->pluck('nombre','id')->all();
        $regiones = Region::orderBy('id', 'ASC')->pluck('nombre','id')->all();
        return \View::make('list', compact('movies'))->with('regiones',$regiones)->with('liricas',$liricas)->with('generos',$generos);
    }

    public function create()
    {
        return \View::make('new');
    }
}

