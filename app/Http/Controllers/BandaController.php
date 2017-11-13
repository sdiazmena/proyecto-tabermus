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
use App\Integrante;
use App\Actualizacion;
use Carbon\Carbon;

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

            $id = DB::table('banda')->insertGetId(['id_usuario' => $iduser,'nombre' => ucwords($request->nombre),'id_ciudad' => $request->ciudad,'id_lirica' => $request->liricaSeleccionado,'id_genero' => $request->generoSeleccionado,'descripcion' => ucfirst($request->descripcion),'imagen'=>'uploads/bandas/'.$name]);
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
            $actualizacion = new Actualizacion();
            $now = new \DateTime();
            $myTme = Carbon::now();
            $actualizacion->fecha = $myTme->toDateString();
            $actualizacion->id_banda = $id;
            $actualizacion->id_ciudad = $request->ciudad;
            $actualizacion->detalles = "Se ha añadido una nueva Banda";
            $actualizacion->id_region = $request->region;
            $actualizacion->id_show = 0;
            $actualizacion->save();
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
        $integrantes = DB::table('integrante')->where('id_banda',$id)->get();
        $rutaPerfil = '/tabermus/public/profile/banda/'.$id.'/edit';
        $rutaHistoria = '/tabermus/public/profile/banda/'.$id.'/historia';
        $rutaDiscos = '/tabermus/public/profile/banda/'.$id.'/discos';
        $rutaFechas = '/tabermus/public/profile/banda/'.$id.'/fechas';
        $editable = 1;
        return view("editarbanda")->with('regiones',$regiones)->with('liricas',$liricas)->with('generos',$generos)->with('banda',$banda)->with('ciudad',$ciudad)->with('region',$region)->with('lirica',$lirica)->with('genero',$genero)->with('integrantes',$integrantes)->with('editable',$editable)->with('rutaPerfil',$rutaPerfil)->with('rutaHistoria',$rutaHistoria)->with('rutaDiscos',$rutaDiscos)->with('rutaFechas',$rutaFechas);
    }
    public function editHistory($id)
    {
        $banda = DB::table('banda')->where('id', $id)->first();
        $rutaPerfil = '/tabermus/public/profile/banda/'.$id.'/edit';
        $rutaHistoria = '/tabermus/public/profile/banda/'.$id.'/historia';
        $rutaDiscos = '/tabermus/public/profile/banda/'.$id.'/discos';
        $rutaFechas = '/tabermus/public/profile/banda/'.$id.'/fechas';
        $editable = 1;        
        return view("editarhistoria")->with('banda',$banda)->with('editable',$editable)->with('rutaPerfil',$rutaPerfil)->with('rutaHistoria',$rutaHistoria)->with('rutaDiscos',$rutaDiscos)->with('rutaFechas',$rutaFechas);
    }
    public function updateHistory(Request $request, $id)
    {
        
        $banda = DB::table('banda')->where('id', $id)->first();
        $ciudad = DB::table('ciudad')->where('id', $banda->id_ciudad)->first();
        $actualizacion = new Actualizacion();
        $now = new \DateTime();
        $actualizacion->fecha = $now->format('d-m-y');
        $actualizacion->id_banda = $banda->id;
        $actualizacion->id_ciudad = $banda->id_ciudad;
        $actualizacion->detalles = "A Actualizado su Historia";
        $actualizacion->id_region = $ciudad->id_region;
        $actualizacion->id_show = 5000;
        $actualizacion->save();
        $banda = new Banda; 
        $banda->where('id','=', $id)
            ->update(['historia' => ucfirst($request->historia)]);
        $banda = DB::table('banda')->where('id', $id)->first();
        $rutaPerfil = '/tabermus/public/profile/banda/'.$id.'/edit';
        $rutaHistoria = '/tabermus/public/profile/banda/'.$id.'/historia';
        $rutaDiscos = '/tabermus/public/profile/banda/'.$id.'/discos';
        $rutaFechas = '/tabermus/public/profile/banda/'.$id.'/fechas';
        $editable = 1;        
        return view("editarhistoria")->with('banda',$banda)->with('editable',$editable)->with('rutaPerfil',$rutaPerfil)->with('rutaHistoria',$rutaHistoria)->with('rutaDiscos',$rutaDiscos)->with('rutaFechas',$rutaFechas)->with('status', 'Historia de Banda editada correctamente');
        //return redirect('/profile')->with('status', 'Historia de Banda editada correctamente');
    }
    public function editarDisco(Request $request, $id)
    {

    }
    public function editDiscos($id)
    {
        
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
        $rutaPerfil = '/tabermus/public/profile/banda/'.$id.'/edit';
        $rutaHistoria = '/tabermus/public/profile/banda/'.$id.'/historia';
        $rutaDiscos = '/tabermus/public/profile/banda/'.$id.'/discos';
        $rutaFechas = '/tabermus/public/profile/banda/'.$id.'/fechas';      
        $editable = 1; 
        return view("editardiscos")->with('regiones',$regiones)->with('liricas',$liricas)->with('generos',$generos)->with('banda',$banda)->with('discos',$discos)->with('listacanciones',$listacanciones)->with('canciones',$canciones)->with('largo',$largo)->with('editable',$editable)->with('rutaPerfil',$rutaPerfil)->with('rutaHistoria',$rutaHistoria)->with('rutaDiscos',$rutaDiscos)->with('rutaFechas',$rutaFechas);
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
            $banda = DB::table('banda')->where('id', $id)->first();
            $ciudad = DB::table('ciudad')->where('id',$banda->id_ciudad)->first();
            $actualizacion = new Actualizacion();
            $now = new \DateTime();
            $actualizacion->fecha = $now->format('d-m-y');
            $actualizacion->id_banda = $banda->id;
            $actualizacion->id_ciudad = $banda->id_ciudad;
            $actualizacion->detalles = "A Agregado un Disco";
            $actualizacion->id_region = $ciudad->id_region;
            $actualizacion->id_show = 5000;
            $actualizacion->save();
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
        $rutaPerfil = '/tabermus/public/profile/banda/'.$id.'/edit';
        $rutaHistoria = '/tabermus/public/profile/banda/'.$id.'/historia';
        $rutaDiscos = '/tabermus/public/profile/banda/'.$id.'/discos';
        $rutaFechas = '/tabermus/public/profile/banda/'.$id.'/fechas';  
        $editable = 1; 
        return view("editarfechas")->with('regiones',$regiones)->with('liricas',$liricas)->with('generos',$generos)->with('banda',$banda)->with('editable',$editable)->with('rutaPerfil',$rutaPerfil)->with('rutaHistoria',$rutaHistoria)->with('rutaDiscos',$rutaDiscos)->with('rutaFechas',$rutaFechas);
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
       //var_dump($request->all());
            
            
       
        if($request->file('image')){
            $banda = DB::table('banda')->where('id', $id)->first();
            $ciudad = DB::table('ciudad')->where('id',$banda->id_ciudad)->first();
            $actualizacion = new Actualizacion();
            $now = new \DateTime();
        $actualizacion->fecha = $now->format('d-m-y');
            $actualizacion->id_banda = $banda->id;
            $actualizacion->id_ciudad = $banda->id_ciudad;
            $actualizacion->detalles = "A Actualizado su Perfil";
            $actualizacion->id_region = $ciudad->id_region;
            $actualizacion->id_show = 5000;
            $actualizacion->save();
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
            $lar = count($request->all());
            $array = $request->all();
            $prueba = Array();
            $x = 0;
            for($i=0;$i<$lar;$i++){
                if(array_key_exists('integrante'.$i, $array)){
                    $integrante = new Integrante();
                    $integrante->nombre = $array['integrante'.$i];
                    $integrante->id_banda = $id;
                    $prueba[$x] = $integrante->nombre;
                    $integrante->save();
                    $x++;
                }
            }
            $largo = count($request->all());
            $array1 = $request->all();
            $int_actuales = DB::table('integrante')->where('id_banda',$id)->get();

            $m = 0;
            for($i=0;$i<$largo;$i++){
                if(array_key_exists('integrantes'.$i, $array1)){
                    foreach($int_actuales as $int){
                        if($int->nombre == $array1['integrantes'.$i]){
                            $prueba[$x] = $array1['integrantes'.$i];
                            $x++;
                            $m = 1;
                        }
                    }
                    if($m == 0){
                        $miembro = new Integrante();
                        $miembro->nombre = $array1['integrantes'.$i];
                        $miembro->id_banda = $id;
                        $prueba[$x] = $miembro->nombre;
                        $miembro->save();     
                        $x++;                   
                    }
                    $m = 0;
                }
            }
            $m=0;
            foreach($int_actuales as $int){
                for($i=0;$i<count($prueba);$i++){
                    if($int->nombre == $prueba[$i]){
                        $m = 1;
                    }
                }
                if($m==0){
                    DB::table('integrante')->where('nombre', $int->nombre)->delete();
                }
                $m=0;
            }
                return redirect('/profile')->with('status', 'Perfil de Banda editada correctamente');
            
        }else{
            $banda = DB::table('banda')->where('id', $id)->first();
            $ciudad = DB::table('ciudad')->where('id',$banda->id_ciudad)->first();
            $actualizacion = new Actualizacion();
            $now = new \DateTime();
        $actualizacion->fecha = $now->format('d-m-y');
            $actualizacion->id_banda = $banda->id;
            $actualizacion->id_ciudad = $banda->id_ciudad;
            $actualizacion->detalles = "A Actualizado su Perfil";
            $actualizacion->id_region = $ciudad->id_region;
            $actualizacion->id_show = 5000;
            $actualizacion->save();
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
            $lar = count($request->all());
            $array = $request->all();
            $prueba = Array();
            $x = 0;
            for($i=0;$i<$lar;$i++){
                if(array_key_exists('integrante'.$i, $array)){
                    $integrante = new Integrante();
                    $integrante->nombre = $array['integrante'.$i];
                    $integrante->id_banda = $id;
                    $prueba[$x] = $integrante->nombre;
                    $integrante->save();
                    $x++;
                }
            }
            $largo = count($request->all());
            $array1 = $request->all();
            $int_actuales = DB::table('integrante')->where('id_banda',$id)->get();

            $m = 0;
            for($i=0;$i<$largo;$i++){
                if(array_key_exists('integrantes'.$i, $array1)){
                    foreach($int_actuales as $int){
                        if($int->nombre == $array1['integrantes'.$i]){
                            $prueba[$x] = $array1['integrantes'.$i];
                            $x++;
                            $m = 1;
                        }
                    }
                    if($m == 0){
                        $miembro = new Integrante();
                        $miembro->nombre = $array1['integrantes'.$i];
                        $miembro->id_banda = $id;
                        $prueba[$x] = $miembro->nombre;
                        $miembro->save();     
                        $x++;                   
                    }
                    $m = 0;
                }
            }
            $m=0;
            foreach($int_actuales as $int){
                for($i=0;$i<count($prueba);$i++){
                    if($int->nombre == $prueba[$i]){
                        $m = 1;
                    }
                }
                if($m==0){
                    DB::table('integrante')->where('nombre', $int->nombre)->delete();
                }
                $m=0;
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
