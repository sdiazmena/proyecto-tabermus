<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Storage;
use Input;
use Validator;
use Auth;
use App\Genero;
use App\Lirica;
use App\Banda;
use App\User;
use App\DatoBusqueda as Datos;

class MovieController extends Controller
{
    public function index()
    {
        $datos = Datos::all();
        return \View::make('list',compact('datos'));
    }

    public function store(Request $request)
    {
        $dato = new Datos;
        $dato->nombre = $request->nombre;
        $dato->description = $request->description;
        $dato->save();
        return redirect('list');

    }
    public function search(Request $request){
        if($request->tipo == "Banda"){
            $datos = Datos::where('nombre','like','%'.$request->nombre.'%')->get();
        }else if($request->tipo == "Banda"){
            $datos = Datos::where('nombre','like','%'.$request->nombre.'%')->get();
        }else{
            $datos = Datos::where('nombre','like','%'.$request->nombre.'%')->get();
        }
        return \View::make('list', compact('datos'));
    }

}
