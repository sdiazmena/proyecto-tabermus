<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Region;
use App\Genero;
use App\Lirica;
use DB;
use Storage;
use Input;
use App\Banda;
use Validator;
use Auth;
use App\User;
use App\Cancion;
use App\Disco;
use App\ListaCanciones;


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
        $rules = ['image' => 'required|image|max:1024*1024*1',];
        $messages = [
            'image.required' => 'La imagen es requerida',
            'image.image' => 'Formato no permitido',
            'image.max' => 'El máximo permitido es 2 MB',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()){
            return redirect('/profile/banda')->withErrors($validator);
        }else{
            $int = $request->Integrantes;
            $iduser = \Auth::user()->id;
            //obtenemos el campo file definido en el formulario
            $name = str_random(30) . '-' . $request->file('image')->getClientOriginalName();
            
            $request->file('image')->move('uploads/bandas', $name);

            $id = DB::table('banda')->insertGetId(['id_usuario' => $iduser,'nombre' => $request->nombre,'id_ciudad' => $request->ciudad,'id_lirica' => $request->liricaSeleccionado,'id_genero' => $request->generoSeleccionado,'descripcion' => $request->descripcion,'imagen'=>'uploads/bandas/'.$name]);
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
            return redirect('/profile')->with('status', 'Banda creada correctamente');
        }
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
        $banda = DB::table('banda')->where('id', $id)->first();
        $liricas = Lirica::orderBy('nombre', 'ASC')->pluck('nombre','id')->all();
        $generos = Genero::orderBy('nombre', 'ASC')->pluck('nombre','id')->all();
        $regiones = Region::orderBy('id', 'ASC')->pluck('nombre','id')->all();
        $ciudad = DB::table('ciudad')->where('id',$banda->id_ciudad)->first();
        $region = DB::table('region')->where('id',$ciudad->id_region)->first();
        $lirica = DB::table('lirica')->where('id',$banda->id_lirica)->first();
        $genero = DB::table('genero')->where('id',$banda->id_genero)->first();

        return view("editarbanda")->with('regiones',$regiones)->with('liricas',$liricas)->with('generos',$generos)->with('banda',$banda)->with('ciudad',$ciudad)->with('region',$region)->with('lirica',$lirica)->with('genero',$genero);
    }
    public function editHistory($id)
    {
        $banda = DB::table('banda')->where('id', $id)->first();
        return view("editarhistoria")->with('banda',$banda);
    }
    public function updateHistory(Request $request, $id)
    {
        $banda = new Banda; 
        $banda->where('id','=', $id)
            ->update(['historia' => $request->historia]);
        return redirect('/profile')->with('status', 'Historia de Banda editada correctamente');
    }
    public function editDiscos($id)
    {
        
        $banda = DB::table('banda')->where('id', $id)->first();
        $liricas = Lirica::orderBy('nombre', 'ASC')->pluck('nombre','id')->all();
        $generos = Genero::orderBy('nombre', 'ASC')->pluck('nombre','id')->all();
        $regiones = Region::orderBy('id', 'ASC')->pluck('nombre','id')->all();
  

        return view("editardiscos")->with('regiones',$regiones)->with('liricas',$liricas)->with('generos',$generos)->with('banda',$banda);
    }
    public function updateDiscos(Request $request, $id)
    {
        $rules = ['image' => 'required|max:1024*1024*1',];
        $messages = [
            'image.required' => 'La imagen es requerida',

            'image.max' => 'El máximo permitido es 2 MB',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()){
            return redirect('/profile/banda/'.$id.'/discos')->withErrors($validator);
        }else{
            $name = str_random(30) . '-' . $request->file('image')->getClientOriginalName();
            
            $request->file('image')->move('uploads/discos', $name);
            $id_disco = DB::table('disco')->insertGetId(['id_banda' => $id  , 'nombre' => $request->nombre  ,'año' => $request->año ,'sello' =>  $request->sello ,'tipo' => $request->tipo  ,'caratula' => 'uploads/discos/'.$name]);
            $id_lista = DB::table('lista_canciones')->insertGetId(['id_disco' =>  $id_disco,'id_cancion' => 'prueba']);
            $lar = count($request->all());
            $array = $request->all();
            for($i=1;$i<$lar;$i++){
                if(array_key_exists('canciones'.$i, $array)){
                    $cancion = new Cancion();
                    $cancion->titulo = $array['canciones'.$i];
                    $cancion->id_lista = $id_lista;
                    $cancion->id_banda = $id;
                    $cancion->save();
                }else{
                    return redirect('/profile')->with('status', 'Disco de Banda editada correctamente');
                }
            }
            
        }
    }
    public function editFechas($id)
    {
        $banda = DB::table('banda')->where('id', $id)->first();
        $liricas = Lirica::orderBy('nombre', 'ASC')->pluck('nombre','id')->all();
        $generos = Genero::orderBy('nombre', 'ASC')->pluck('nombre','id')->all();
        $regiones = Region::orderBy('id', 'ASC')->pluck('nombre','id')->all();
  

        return view("editarfechas")->with('regiones',$regiones)->with('liricas',$liricas)->with('generos',$generos)->with('banda',$banda);
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
        if($request->file('image')){
            $name = str_random(30) . '-' . $request->file('image')->getClientOriginalName();   
            $request->file('image')->move('uploads/bandas', $name);

                $banda = new Banda;
                $banda->where('id','=', $id)
                     ->update(['nombre' => $request->nombre, 'descripcion' => $request->descripcion, 'facebook' => $request->facebook, 'instagram' => $request->instagram, 'twitter' => $request->twitter, 'soundcloud' => $request->soundcloud, 'spotify' => $request->spotify, 'youtube' => $request->youtube, 'imagen' => 'uploads/bandas/'.$name]);
            if($request->generoSeleccionado){
                $banda->where('id','=', $id)
                     ->update(['id_genero' => $request->generoSeleccionado]);
            }
            if($request->liricaSeleccionado){
                $banda->where('id','=', $id)
                     ->update(['id_lirica' => $request->liricaSeleccionado]);
            }
            if($request->ciudad != "placeholder"){
                $banda->where('id','=', $id)
                     ->update(['id_ciudad' => $request->ciudad]);
            }
                return redirect('/profile')->with('status', 'Perfil de Banda editada correctamente');
            
        }else{
            $banda = new Banda;
            $banda->where('id','=', $id)
                     ->update(['nombre' => $request->nombre, 'descripcion' => $request->descripcion, 'facebook' => $request->facebook, 'instagram' => $request->instagram, 'twitter' => $request->twitter, 'soundcloud' => $request->soundcloud, 'spotify' => $request->spotify, 'youtube' => $request->youtube]);
            if($request->generoSeleccionado){
                $banda->where('id','=', $id)
                     ->update(['id_genero' => $request->generoSeleccionado]);
            }
            if($request->liricaSeleccionado){
                $banda->where('id','=', $id)
                     ->update(['id_lirica' => $request->liricaSeleccionado]);
            }
            if($request->ciudad != "placeholder"){
                $banda->where('id','=', $id)
                     ->update(['id_ciudad' => $request->ciudad]);
            }
            return redirect('/profile')->with('status', 'Perfil de Banda editada correctamente');
        }
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
