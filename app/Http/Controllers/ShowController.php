<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Show;
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

        $data = DB::table('shows')->where('id_region',$id[0]->id)->get(['title','start','color','end','id']);
     
        return Response()->json($data);
    }
    public function getDataBanda($id)
    {
        
        $data = DB::table('shows')->where('id_banda',$id)->get(['title','start','color','end','id','id_banda']);
     
       return Response()->json($data);
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
        $show = new Show();
        $show->title = $request->title;
        $show->informacion = $request->informacion;
        $show->id_ciudad = $request->ciudad_id;
        $show->id_banda = $request->id_banda;
        $show->id_region = $request->region;
        $show->start = $request->date_start;
        $show->end = $request->date_end;
        $show->color = "#0000FF";
        $show->save();
        $id = DB::table('shows')->where('title',$request->title)->get(['id']);
        $actualizacion = new Actualizacion();
        $now = new \DateTime();
        $actualizacion->fecha = $now->format('d-m-y');
        $actualizacion->id_banda = $request->id_banda;
        $actualizacion->id_ciudad = $request->ciudad_id;
        $actualizacion->id_show = $id[0]->id;
        $actualizacion->detalles = "A Creado un nuevo show";
        $actualizacion->id_region = $request->region;
        $actualizacion->save();
        return redirect('/profile')->with('status', 'Evento creado correctamente');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        /*
        $show = Show::find($id);

        if($show == null){
            return Response()->json([
                'message' => 'error delete.'
            ]);
        }
        $show->delete();

        return Response()->json([
            'message' => 'success delete.'
        ]);*/
    }
}
