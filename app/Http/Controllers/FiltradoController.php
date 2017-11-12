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

        if($request->seleccion == 'region'){
            $bandas = banda::where('nombre','like','%'.$request->nombre.'%')->orderBy('id_ciudad','asc')->get();

        }else if ($request->seleccion == 'letra'){
            $bandas = banda::where('nombre','like','%'.$request->nombre.'%')->orderBy('nombre','asc')->get();

        }else{
            $bandas = banda::where('nombre','like','%'.$request->nombre.'%')->orderBy('id_genero','asc')->get();
        }

        return \View::make('filtrado', compact('bandas'))->with('regiones',$regiones)->with('liricas',$liricas)->with('generos',$generos);
    }

    public function filtradoRegional(Request $request){

        $liricas = Lirica::orderBy('nombre', 'ASC')->pluck('nombre','id')->all();
        $generos = Genero::orderBy('nombre', 'ASC')->pluck('nombre','id')->all();
        $regiones = Region::orderBy('id', 'ASC')->pluck('nombre','id')->all();
        $ciudad = Ciudad::ciudades($_COOKIE['idRegion']);

        if($request->seleccion == 'Ciudad'){
            $bandas = DB::table('banda')
                ->whereIn('banda.id_ciudad', $ciudad )
                ->orderBy('id_ciudad','asc')
                ->get();
            //dd($bandas);

        }else if ($request->seleccion == 'Letra'){
            $bandas = DB::table('banda')
                ->whereIn('banda.id_ciudad', $ciudad )
                ->orderBy('nombre','asc')
                ->get();

        }else{
            $bandas = DB::table('banda')
                ->whereIn('banda.id_ciudad', $ciudad )
                ->orderBy('id_genero','asc')
                ->get();
        }

        return \View::make('filtrado', compact('bandas'))->with('regiones',$regiones)->with('liricas',$liricas)->with('generos',$generos);
    }

    public function filtrado(Request $request){

        $liricas = Lirica::orderBy('nombre', 'ASC')->pluck('nombre','id')->all();
        $generos = Genero::orderBy('nombre', 'ASC')->pluck('nombre','id')->all();
        $regiones = Region::orderBy('id', 'ASC')->pluck('nombre','id')->all();

        //dd($request);

        if($request->letra == 'Todo'){
            $request->letra = '';
        }
        $bandasNombre = Banda::where('nombre','like','%'.$request->letra.'%');

        if($request->genero){

        }else{
            $request->genero = '';
        }
        if($request->ciudad == 'placeholder'){
            $request->ciudad = '';
        }
        if($request->region){
            $ciudad = Ciudad::ciudades($request->region);
        }else{
            $ciudad = Db::table('ciudad')->get();
        }

        //dd($request->ciudad);
        //dd($ciudad);

        //dd($request);

        $bandas = Banda::where('nombre','like','%'.$request->letra.'%')
            ->whereIn('banda.id_ciudad', $ciudad )
            //->where('banda.id_genero', '=', $request->genero)
            ->orderBy('nombre','asc')
            ->get();
        //dd($bandas);


        return \View::make('filtrado', compact('bandas'))->with('regiones',$regiones)->with('liricas',$liricas)->with('generos',$generos);
    }
}

