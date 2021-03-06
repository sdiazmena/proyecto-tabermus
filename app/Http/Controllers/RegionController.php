<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ciudad; 
use DB;
class RegionController extends Controller
{
    //
	public function getCiudades(Request $request, $id)
	{
		if($request->ajax())
		{
            $ciudades = array();
			$ciudades = Ciudad::ciudades($id);
			return response()->json($ciudades);
		}
	}
    public function getCiudad(Request $request,$id)
    {
        if($request->ajax())
        {
            $ciudad = DB::table('ciudad')->where('id',$id)->get();
            return response()->json($ciudad);
        }
    }
    public function getRegion(Request $request,$id)
    {
        if($request->ajax())
        {
            $region = DB::table('region')->where('id',$id)->get();
            return response()->json($region);
        }
    }
    public function index()
    {
        //
 
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
        //
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
    }
}
