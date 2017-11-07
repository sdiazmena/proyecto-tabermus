<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Show;
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
        $data = Show::get(['title','start','color','end','id']);
     
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
        $show->start = $request->date_start;
        $show->end = $request->date_end;
        $show->color = $request->color;
        $show->save();
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
