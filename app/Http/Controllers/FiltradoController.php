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

    public function store(Request $request)
    {
        $banda = new Banda;
        $banda->nombre = $request->nombre;
        $banda->genero = $request->description;
        $banda->save();
        return redirect('filtrado');

    }

    public function filtradoNacional(Request $request){

        $liricas = Lirica::orderBy('nombre', 'ASC')->pluck('nombre','id')->all();
        $generos = Genero::orderBy('nombre', 'ASC')->pluck('nombre','id')->all();
        $regiones = Region::orderBy('id', 'ASC')->pluck('nombre','id')->all();

        $bandas = Banda::where('nombre','like','%'.$request->nombre.'%')->get();

        return \View::make('filtrado', compact('bandas'))->with('regiones',$regiones)->with('liricas',$liricas)->with('generos',$generos);
    }

    public function filtradoRegional(Request $request){

        $liricas = Lirica::orderBy('nombre', 'ASC')->pluck('nombre','id')->all();
        $generos = Genero::orderBy('nombre', 'ASC')->pluck('nombre','id')->all();
        $regiones = Region::orderBy('id', 'ASC')->pluck('nombre','id')->all();

        $bandas = banda::where('nombre','like','%'.$request->nombre.'%')->get();

        return \View::make('filtrado', compact('bandas'))->with('regiones',$regiones)->with('liricas',$liricas)->with('generos',$generos);
    }

    public function filtrado(Request $request){

        $liricas = Lirica::orderBy('nombre', 'ASC')->pluck('nombre','id')->all();
        $generos = Genero::orderBy('nombre', 'ASC')->pluck('nombre','id')->all();
        $regiones = Region::orderBy('id', 'ASC')->pluck('nombre','id')->all();

        $bandas = banda::where('nombre','like','%'.$request->nombre.'%')->get();

        return \View::make('filtrado', compact('bandas'))->with('regiones',$regiones)->with('liricas',$liricas)->with('generos',$generos);
    }
}

