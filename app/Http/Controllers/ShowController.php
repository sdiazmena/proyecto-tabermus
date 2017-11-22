<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Show;
use App\Genero;
use App\Lirica;
use App\Region;
USE DB;
use App\Actualizacion;
class ShowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        return view('calendario');

    }
    public function getData()
    {
        $nombreRegion = $_COOKIE["nameRegion"];

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

        $data = DB::table('shows')->where('id_region',$id[0]->id)->get(['title','start','color','end','id','link','precio']);
     
        return Response()->json($data);
    }
    public function getDataBanda($id)
    {
        
        $data = DB::table('shows')->where('id_banda',$id)->get(['title','start','color','end','id','id_banda','informacion','id_region','id_ciudad','link','precio']);
     
       return Response()->json($data);
    }
    public function showDelete($id){

        $banda = DB::table('banda')->where('id', $id)->first();
        $liricas = Lirica::orderBy('nombre', 'ASC')->pluck('nombre','id')->all();
        $generos = Genero::orderBy('nombre', 'ASC')->pluck('nombre','id')->all();
        $regiones = Region::orderBy('id', 'ASC')->pluck('nombre','id')->all();
        $rutaPerfil = '/tabermus/public/profile/banda/'.$id.'/edit';
        $rutaHistoria = '/tabermus/public/profile/banda/'.$id.'/historia';
        $rutaDiscos = '/tabermus/public/profile/banda/'.$id.'/discos';
        $rutaFechas = '/tabermus/public/profile/banda/'.$id.'/fechas';  
        $editable = 1; 
        $status = "Show eliminado correctamente";
        return view("editarfechas")->with('regiones',$regiones)->with('liricas',$liricas)->with('generos',$generos)->with('banda',$banda)->with('editable',$editable)->with('rutaPerfil',$rutaPerfil)->with('rutaHistoria',$rutaHistoria)->with('rutaDiscos',$rutaDiscos)->with('rutaFechas',$rutaFechas)->with('status',$status);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $banda = DB::table('banda')->where('id', $request->id_banda)->first();
        $liricas = Lirica::orderBy('nombre', 'ASC')->pluck('nombre','id')->all();
        $generos = Genero::orderBy('nombre', 'ASC')->pluck('nombre','id')->all();
        $regiones = Region::orderBy('id', 'ASC')->pluck('nombre','id')->all();
        $rutaPerfil = '/tabermus/public/profile/banda/'.$request->id_banda.'/edit';
        $rutaHistoria = '/tabermus/public/profile/banda/'.$request->id_banda.'/historia';
        $rutaDiscos = '/tabermus/public/profile/banda/'.$request->id_banda.'/discos';
        $rutaFechas = '/tabermus/public/profile/banda/'.$request->id_banda.'/fechas';  
        $editable = 1; 
        $status = 'Show creado correctamente';

        $show = new Show();
        $show->title = $request->title;
        $show->informacion = $request->informacion;
        $show->id_ciudad = $request->ciudad_id;
        $show->id_banda = $request->id_banda;
        $show->id_region = $request->region;
        $show->start = $request->date_start;
        $show->end = $request->date_end;
        $show->link = $request->link;
        $show->precio = $request->precio;
        $show->color = "#0000FF";
        $show->save();
        $id = DB::table('shows')->where('title',$request->title)->get(['id']);
        $actualizacion = new Actualizacion();
        $now = new \DateTime();
        $now = Carbon::now();
        $actualizacion->fecha = $now->toDateTimeString();
        $actualizacion->id_banda = $request->id_banda;
        $actualizacion->id_ciudad = $request->ciudad_id;
        $actualizacion->id_show = $id[0]->id;
        $actualizacion->detalles = "Se ha añadido un nuevo show";
        $actualizacion->id_region = $request->region;
        $actualizacion->save();
        


        return view("editarfechas")->with('regiones',$regiones)->with('liricas',$liricas)->with('generos',$generos)->with('banda',$banda)->with('editable',$editable)->with('rutaPerfil',$rutaPerfil)->with('rutaHistoria',$rutaHistoria)->with('rutaDiscos',$rutaDiscos)->with('rutaFechas',$rutaFechas)->with('status',$status);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        if($request->ciudad == "placeholder"){
            DB::table('shows')->where('id',$request->id_show)->update(['title' => $request->title,'informacion'=>$request->informacion,'start'=>$request->date_start,'end'=>$request->date_end,'precio'=>$request->precio,'link'=>$request->link]);
            $id_region = DB::table('region')->where('nombre',$request->id_region)->first();
            $id_ciudad = DB::table('ciudad')->where('nombre',$request->id_ciudad)->first();
            $actualizacion = new Actualizacion();
            $now = Carbon::now();
            $actualizacion->fecha = $now->toDateTimeString();
            $actualizacion->id_banda = $id;
            $actualizacion->id_ciudad = $id_ciudad->id;
            $actualizacion->id_show = $request->id_show;
            $actualizacion->detalles = "Ha editado la información de un show";
            $actualizacion->id_region = $id_region->id;
            $actualizacion->save();
        }else{
            DB::table('shows')->where('id',$request->id_show)->update(['title'=>$request->title,'informacion'=>$request->informacion,'start'=>$request->date_start,'end'=>$request->date_end,'id_ciudad'=>$request->ciudad_id,'id_region'=>$request->region,'precio'=>$request->precio,'link'=>$request->link]);
            $actualizacion = new Actualizacion();
            $now = Carbon::now();
            $actualizacion->fecha = $now->toDateTimeString();
            $actualizacion->id_banda = $id;
            $actualizacion->id_ciudad = $request->ciudad_id;
            $actualizacion->id_show = $request->id_show;
            $actualizacion->detalles = "Ha editado la información de un show";
            $actualizacion->id_region = $request->region;
            $actualizacion->save();
        }
        $banda = DB::table('banda')->where('id', $id)->first();
        $liricas = Lirica::orderBy('nombre', 'ASC')->pluck('nombre','id')->all();
        $generos = Genero::orderBy('nombre', 'ASC')->pluck('nombre','id')->all();
        $regiones = Region::orderBy('id', 'ASC')->pluck('nombre','id')->all();
        $rutaPerfil = '/tabermus/public/profile/banda/'.$id.'/edit';
        $rutaHistoria = '/tabermus/public/profile/banda/'.$id.'/historia';
        $rutaDiscos = '/tabermus/public/profile/banda/'.$id.'/discos';
        $rutaFechas = '/tabermus/public/profile/banda/'.$id.'/fechas';  
        $editable = 1; 
        $status = "Se ha editado el Show correctamente";
        return view("editarfechas")->with('regiones',$regiones)->with('liricas',$liricas)->with('generos',$generos)->with('banda',$banda)->with('editable',$editable)->with('rutaPerfil',$rutaPerfil)->with('rutaHistoria',$rutaHistoria)->with('rutaDiscos',$rutaDiscos)->with('rutaFechas',$rutaFechas)->with('status',$status);

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $show = Show::find($id);

        if($show == null){
            return Response()->json([
                'message' => 'error delete.'
            ]);
        }
        $id = $show->id_banda;
        DB::table('actualizacion')->where('id_show',$show->id)->delete();
        $show->delete();

        return Response()->json($id);
    }
}
