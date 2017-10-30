<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Region;
use DB;
use Storage;
use Input;
use Validator;
use Auth;
use App\User;

class IndexController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regiones = Region::orderBy('id', 'ASC')->pluck('nombre','id')->all();
        return view('index')->with('regiones',$regiones);
    }
}
