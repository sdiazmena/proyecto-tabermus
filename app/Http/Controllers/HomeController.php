<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actualizacion;
use DB;
class HomeController extends Controller
{
    public function index()
    {
        $valor = $_COOKIE["idRegion"];
        $valorImprimir = "img/region/portada".$valor.".jpg";
        $valorImprimir = "<img id='portada1' class='img-responsive ' src=".$valorImprimir." class='img-thumbnail' style='width:820px; height: 350px'>";

        //dd($valorImprimir);

        $nombreRegion =  $_COOKIE["nameRegion"];
        if($nombreRegion == "O'Higgins"){
            $nombreRegion = "Región del Libertador Gral. Bernardo O’Higgins";
        }
        if($nombreRegion == 'Maule'){
            $nombreRegion = "Región del Maule";
        }   
        if($nombreRegion == 'Biobío'){
            $nombreRegion = "Región del Biobío";
        }
        if($nombreRegion == 'Araucania'){
            $nombreRegion = "Región de la Araucanía";
        }
        if($nombreRegion == 'Los Lagos'){
            $nombreRegion = "Región de Los Lagos";
        }
        if($nombreRegion == 'Aisén'){
            $nombreRegion = "Región Aisén del Gral. Carlos Ibáñez del Campo";
        }
        if($nombreRegion == 'Magallanes'){
            $nombreRegion = "Región de Magallanes y de la Antártica Chilena";
        }
        if($nombreRegion == 'Santiago'){
            $nombreRegion = "Región Metropolitana de Santiago";
        }
        if($nombreRegion == 'Los Rios'){
            $nombreRegion = "Región de Los Ríos";
        }
        if($nombreRegion == 'Arica'){
            $nombreRegion = "Arica y Parinacota";
        }
    	$id = DB::table('region')->where('nombre',$nombreRegion)->get(['id']);
    	$data = DB::table('Actualizacion')->where('id_region',$id[0]->id)->orderBy('id', 'desc')->get();
    	$bandas = DB::table('banda')->get();
        //dd($data);
        return view('welcome')->with('actualizaciones',$data)->with('bandas',$bandas)->with('foto',$valorImprimir);
    }

    public function store($request)
    {
        $show = DB::table(show)->where('id', '=', $request)->get();

        $response = array(
            'nombre' => 'success',
            'fechaInicio' => 'fecha',
            'fechaFin' => 'fecha',
            'horaInicio' => 'ini',
            'horaFin' => 'fin',
            'id_ciudad' => 'ciudad',
            'informacion' => 'informacion',
            'valor' => 'dinero',
        );
        return \Response::json($response);
    }
}
