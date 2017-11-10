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
use App\Region;
use App\Cancion;
use App\Disco;
use App\ListaCanciones;
use App\Integrante;

class BusquedaController extends Controller
{
    public function index()
    {
        return view('buscar');
    }

    public function store(Request $request)
    {
        $dato = new Datos;
        $dato->nombre = $request->name;
        $dato->description = $request->description;
        $dato->save();
        return redirect('buscarResultado');

    }
    public function search(Request $request){
        if($request->tipo == "Banda"){
            $datos = Datos::where('nombre','like','%'.$request->nombre.'%')->get();
        }else if($request->tipo == "Banda"){
            $datos = Datos::where('nombre','like','%'.$request->nombre.'%')->get();
        }else{
            $datos = Datos::where('nombre','like','%'.$request->nombre.'%')->get();
        }
        return \View::make('buscarResultado', compact('datos'));
    }
    public function resultado($id){
        $banda = DB::table('banda')->where('id', $id)->first();
        $liricas = Lirica::orderBy('nombre', 'ASC')->pluck('nombre','id')->all();
        $generos = Genero::orderBy('nombre', 'ASC')->pluck('nombre','id')->all();
        $regiones = Region::orderBy('id', 'ASC')->pluck('nombre','id')->all();
        $ciudad = DB::table('ciudad')->where('id',$banda->id_ciudad)->first();
        $region = DB::table('region')->where('id',$ciudad->id_region)->first();
        $lirica = DB::table('lirica')->where('id',$banda->id_lirica)->first();
        $genero = DB::table('genero')->where('id',$banda->id_genero)->first();
        $integrantes = DB::table('integrante')->where('id_banda',$id)->get();
        $editable = 0;
        $rutaPerfil = '/tabermus/public/buscar/banda/'.$id;
        $rutaHistoria = '/tabermus/public/buscar/banda/'.$id.'/historia';
        $rutaDiscos = '/tabermus/public/buscar/banda/'.$id.'/discos';
        $rutaFechas = '/tabermus/public/buscar/banda/'.$id.'/fechas';

        return view("editarbanda")->with('regiones',$regiones)->with('liricas',$liricas)->with('generos',$generos)->with('banda',$banda)->with('ciudad',$ciudad)->with('region',$region)->with('lirica',$lirica)->with('genero',$genero)->with('integrantes',$integrantes)->with('editable',$editable)->with('rutaPerfil',$rutaPerfil)->with('rutaHistoria',$rutaHistoria)->with('rutaDiscos',$rutaDiscos)->with('rutaFechas',$rutaFechas);
    }
    public function discos($id){
        $banda = DB::table('banda')->where('id', $id)->first();
        $liricas = Lirica::orderBy('nombre', 'ASC')->pluck('nombre','id')->all();
        $generos = Genero::orderBy('nombre', 'ASC')->pluck('nombre','id')->all();
        $regiones = Region::orderBy('id', 'ASC')->pluck('nombre','id')->all();
        $discos =  DB::table('disco')->where('id_banda', $id)->get();
        $listacanciones = array();
        foreach($discos as $disco){
            $lista = DB::table('lista_canciones')->where('id_disco', $disco->id)->first();
            array_push($listacanciones, $lista);
        }
        $largo = count($listacanciones);
        //var_dump($largo);
        $canciones = array();
        for($i=0;$i<$largo;$i++){
            $cancion = DB::table('cancion')->where('id_lista', $listacanciones[$i]->id)->get();
            array_push($canciones, $cancion);
        }
        //var_dump($canciones[0][0]->id);
        $rutaPerfil = '/tabermus/public/buscar/banda/'.$id;
        $rutaHistoria = '/tabermus/public/buscar/banda/'.$id.'/historia';
        $rutaDiscos = '/tabermus/public/buscar/banda/'.$id.'/discos';
        $rutaFechas = '/tabermus/public/buscar/banda/'.$id.'/fechas';     
        $editable = 0; 
        return view("editardiscos")->with('regiones',$regiones)->with('liricas',$liricas)->with('generos',$generos)->with('banda',$banda)->with('discos',$discos)->with('listacanciones',$listacanciones)->with('canciones',$canciones)->with('largo',$largo)->with('editable',$editable)->with('rutaPerfil',$rutaPerfil)->with('rutaHistoria',$rutaHistoria)->with('rutaDiscos',$rutaDiscos)->with('rutaFechas',$rutaFechas);
    }
    public function historia($id){
        $banda = DB::table('banda')->where('id', $id)->first();
        $rutaPerfil = '/tabermus/public/buscar/banda/'.$id;
        $rutaHistoria = '/tabermus/public/buscar/banda/'.$id.'/historia';
        $rutaDiscos = '/tabermus/public/buscar/banda/'.$id.'/discos';
        $rutaFechas = '/tabermus/public/buscar/banda/'.$id.'/fechas';
        $editable = 0;        
        return view("editarhistoria")->with('banda',$banda)->with('editable',$editable)->with('rutaPerfil',$rutaPerfil)->with('rutaHistoria',$rutaHistoria)->with('rutaDiscos',$rutaDiscos)->with('rutaFechas',$rutaFechas);
    }
    public function fechas($id){
        $banda = DB::table('banda')->where('id', $id)->first();
        $liricas = Lirica::orderBy('nombre', 'ASC')->pluck('nombre','id')->all();
        $generos = Genero::orderBy('nombre', 'ASC')->pluck('nombre','id')->all();
        $regiones = Region::orderBy('id', 'ASC')->pluck('nombre','id')->all();
        $rutaPerfil = '/tabermus/public/buscar/banda/'.$id;
        $rutaHistoria = '/tabermus/public/buscar/banda/'.$id.'/historia';
        $rutaDiscos = '/tabermus/public/buscar/banda/'.$id.'/discos';
        $rutaFechas = '/tabermus/public/buscar/banda/'.$id.'/fechas';  
        $editable = 0; 
        return view("editarfechas")->with('regiones',$regiones)->with('liricas',$liricas)->with('generos',$generos)->with('banda',$banda)->with('editable',$editable)->with('rutaPerfil',$rutaPerfil)->with('rutaHistoria',$rutaHistoria)->with('rutaDiscos',$rutaDiscos)->with('rutaFechas',$rutaFechas);
    }
}
