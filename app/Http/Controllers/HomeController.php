<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actualizacion;
use DB;
use Validator;
use Auth;
use Storage;
use Input;
class HomeController extends Controller
{
    public function index()
    {
        $valor = $_COOKIE["idRegion"];
        $valorImprimir = "img/region/portada".$valor.".jpg";
        $valorImprimir = "<img id='portada1' class='img-responsive ' src=".$valorImprimir." class='img-thumbnail' style='width:820px; height: 350px'>";

    	$data = DB::table('Actualizacion')->where('id_region',$valor)->orderBy('id', 'desc')->get();
    	$bandas = DB::table('banda')->get();
        //dd($data);
        return view('welcome')->with('actualizaciones',$data)->with('bandas',$bandas)->with('foto',$valorImprimir);
    }

    public function store(Request $request, $id)
    {
        if($request->ajax()){
            $show = DB::table('shows')->where('id', $id)->get();
            return Response()->json($show);
        }

    }
}
