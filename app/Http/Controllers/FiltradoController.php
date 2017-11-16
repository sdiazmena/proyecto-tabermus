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
use App\Ciudad;
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
        $ciudades = DB::table('ciudad')->get();
        $regionestraductor = DB::table('region')->get();
        $generostraductor = DB::table('genero')->get();
        $liricastraductor = DB::table('lirica')->get();
        $ciudadestraductor = DB::table('ciudad')->get();
        $regionactual = 'todo';

        if($request->seleccion == 'region'){
            $bandas = banda::where('nombre','like','%'.$request->nombre.'%')->orderBy('id_ciudad','asc')->get();

        }else if ($request->seleccion == 'letra'){
            $bandas = banda::where('nombre','like','%'.$request->nombre.'%')->orderBy('nombre','asc')->get();

        }else{
            $bandas = banda::where('nombre','like','%'.$request->nombre.'%')->orderBy('id_genero','asc')->get();
        }

        //dd($bandas);


        return \View::make('filtrado', compact('bandas'))->with('regionactual',$regionactual)->with('regionestraductor',$regionestraductor)->with('liricastraductor',$liricastraductor)->with('generostraductor',$generostraductor)->with('ciudadestraductor',$ciudadestraductor)->with('ciudades',$ciudades)->with('regiones',$regiones)->with('generos',$generos)->with('liricas',$liricas);
    }

    public function filtradoRegional(Request $request){

        $liricas = Lirica::orderBy('nombre', 'ASC')->pluck('nombre','id')->all();
        $generos = Genero::orderBy('nombre', 'ASC')->pluck('nombre','id')->all();
        $regiones = Region::orderBy('id', 'ASC')->pluck('nombre','id')->all();
        $ciudad = Ciudad::ciudades($_COOKIE["idRegion"]);
        //$ciudad = DB::table('ciudad')->where('id_region', '=', $_COOKIE["idRegion"])->get();
        $regionestraductor = DB::table('region')->get();
        $generostraductor = DB::table('genero')->get();
        $liricastraductor = DB::table('lirica')->get();
        $ciudadestraductor = DB::table('ciudad')->get();
        $regionactual = $_COOKIE['idRegion'];

        //dd($ciudad);

        if($request->seleccion == 'Ciudad'){
            $bandas = DB::table('banda')
                ->join('ciudad', 'banda.id_ciudad', '=', 'ciudad.id')
                ->where('ciudad.id_region', $_COOKIE['idRegion'])
                ->select('banda.*', 'ciudad.id_region')
                ->orderBy('id_ciudad','asc')
                ->get();

        }else if ($request->seleccion == 'Letra'){
            $bandas = DB::table('banda')
                ->join('ciudad', 'banda.id_ciudad', '=', 'ciudad.id')
                ->where('ciudad.id_region', $_COOKIE['idRegion'])
                ->select('banda.*', 'ciudad.id_region')
                ->orderBy('nombre','asc')
                ->get();

        }else{
            $bandas = DB::table('banda')
                ->join('ciudad', 'banda.id_ciudad', '=', 'ciudad.id')
                ->where('ciudad.id_region', $_COOKIE['idRegion'])
                ->select('banda.*', 'ciudad.id_region')
                ->orderBy('id_genero','asc')
                ->get();
        }

        //dd($bandas);

        return \View::make('filtrado', compact('bandas'))->with('regionactual',$regionactual)->with('regionestraductor',$regionestraductor)->with('liricastraductor',$liricastraductor)->with('generostraductor',$generostraductor)->with('ciudadestraductor',$ciudadestraductor)->with('ciudades',$ciudad)->with('regiones',$regiones)->with('generos',$generos)->with('liricas',$liricas);
    }

    public function filtrado(Request $request){

        $liricas = Lirica::orderBy('nombre', 'ASC')->pluck('nombre','id')->all();
        $generos = Genero::orderBy('nombre', 'ASC')->pluck('nombre','id')->all();
        $regiones = Region::orderBy('id', 'ASC')->pluck('nombre','id')->all();
        $regionestraductor = DB::table('region')->get();
        $generostraductor = DB::table('genero')->get();
        $liricastraductor = DB::table('lirica')->get();
        $ciudadestraductor = DB::table('ciudad')->get();
        $regionactual = $request->region;

        //dd($request);

        if($request->letra == 'Todo'){
            $request->letra = '';
        }

        if($request->region){
            $ciudad = Ciudad::ciudades($request->region);
        }
        //dd($ciudad);

        if($request->genero){
            if($request->orden == 'Alfabeticamente'){
                $bandas = Banda::where('banda.nombre','like','%'.$request->letra.'%')
                    ->where('banda.id_genero', '=', $request->genero)
                    ->join('ciudad', 'banda.id_ciudad', '=', 'ciudad.id')
                    ->where('ciudad.id_region', $request->region)
                    ->select('banda.*', 'ciudad.id_region')
                    ->orderBy('banda.nombre','asc')
                    ->get();


            }elseif ($request->orden == 'Ciudad'){
                $bandas = Banda::where('banda.nombre','like','%'.$request->letra.'%')
                    ->where('banda.id_genero', '=', $request->genero)
                    ->join('ciudad', 'banda.id_ciudad', '=', 'ciudad.id')
                    ->where('ciudad.id_region', $request->region)
                    ->select('banda.*', 'ciudad.id_region')
                    ->orderBy('id_ciudad','asc')
                    ->get();

            }elseif ($request->orden == 'Genero'){
                $bandas = Banda::where('banda.nombre','like','%'.$request->letra.'%')
                    ->where('banda.id_genero', '=', $request->genero)
                    ->join('ciudad', 'banda.id_ciudad', '=', 'ciudad.id')
                    ->where('ciudad.id_region', $request->region)
                    ->select('banda.*', 'ciudad.id_region')
                    ->orderBy('id_genero','asc')
                    ->get();

            }else{
                $bandas = Banda::where('banda.nombre','like','%'.$request->letra.'%')
                    ->where('banda.id_genero', '=', $request->genero)
                    ->join('ciudad', 'banda.id_ciudad', '=', 'ciudad.id')
                    ->where('ciudad.id_region', $request->region)
                    ->select('banda.*', 'ciudad.id_region')
                    ->orderBy('id_lirica','asc')
                    ->get();

            }
        }else{
            if($request->orden == 'Alfabeticamente'){
                $bandas = Banda::where('banda.nombre','like','%'.$request->letra.'%')
                    ->join('ciudad', 'banda.id_ciudad', '=', 'ciudad.id')
                    ->where('ciudad.id_region', $request->region)
                    ->select('banda.*', 'ciudad.id_region')
                    ->orderBy('banda.nombre','asc')
                    ->get();

            }elseif ($request->orden == 'Ciudad'){
                $bandas = Banda::where('banda.nombre','like','%'.$request->letra.'%')
                    ->join('ciudad', 'banda.id_ciudad', '=', 'ciudad.id')
                    ->where('ciudad.id_region', $request->region)
                    ->select('banda.*', 'ciudad.id_region')
                    ->orderBy('banda.id_ciudad','asc')
                    ->get();

            }elseif ($request->orden == 'Genero'){
                $bandas = Banda::where('banda.nombre','like','%'.$request->letra.'%')
                    ->join('ciudad', 'banda.id_ciudad', '=', 'ciudad.id')
                    ->where('ciudad.id_region', $request->region)
                    ->select('banda.*', 'ciudad.id_region')
                    ->orderBy('banda.id_genero','asc')
                    ->get();

            }else{
                $bandas = Banda::where('banda.nombre','like','%'.$request->letra.'%')
                    ->join('ciudad', 'banda.id_ciudad', '=', 'ciudad.id')
                    ->where('ciudad.id_region', $request->region)
                    ->select('banda.*', 'ciudad.id_region')
                    ->orderBy('banda.id_lirica','asc')
                    ->get();

            }
        }

        //dd($bandas);


        return \View::make('filtrado', compact('bandas'))->with('regionactual',$regionactual)->with('regionestraductor',$regionestraductor)->with('liricastraductor',$liricastraductor)->with('generostraductor',$generostraductor)->with('ciudadestraductor',$ciudadestraductor)->with('ciudades',$ciudad)->with('regiones',$regiones)->with('generos',$generos)->with('liricas',$liricas);
    }
}

