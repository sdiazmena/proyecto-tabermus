<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Region;
use App\Genero;
use App\Lirica;
use DB;
use Storage;
use Input;

class BandaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $liricas = Lirica::orderBy('nombre', 'ASC')->pluck('nombre','id')->all();
        $generos = Genero::orderBy('nombre', 'ASC')->pluck('nombre','id')->all();
       $regiones = Region::orderBy('id', 'ASC')->pluck('nombre','id')->all();
        return view("banda")->with('regiones',$regiones)->with('liricas',$liricas)->with('generos',$generos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*return view("banda");*/
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $int = $request->Integrantes;
        $iduser = \Auth::user()->id;
        //obtenemos el campo file definido en el formulario


        $id = DB::table('banda')->insertGetId(['id_usuario' => $iduser,'nombre' => $request->nombre,'id_ciudad' => $request->ciudad,'id_lirica' => $request->liricaSeleccionado,'id_genero' => $request->generoSeleccionado,'descripcion' => $request->descripcion]);
        if($request->facebook){
            DB::table('banda')->where('id', $id)->update(['facebook' => $request->facebook]);
        }
        if($request->instagram){
            DB::table('banda')->where('id', $id)->update(['instagram' => $request->instagram]);
        }
        if($request->youtube){
            DB::table('banda')->where('id', $id)->update(['youtube' => $request->youtube]);
        }
        if($request->soundcloud){
            DB::table('banda')->where('id', $id)->update(['soundcloud' => $request->soundcloud]);
        }
        if($request->twitter){
            DB::table('banda')->where('id', $id)->update(['twitter' => $request->twitter]);
        }
        if($request->spotify){
            DB::table('banda')->where('id', $id)->update(['spotify' => $request->spotify]);
        }
        for($i=0;$i < count($int);$i++){
            DB::table('integrante')->insert(['nombre' => $int[$i],'id_banda' => $id]);
        }
        return view('welcome');
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
        var_dump('aqui deberia poder editar');
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
    }
}
