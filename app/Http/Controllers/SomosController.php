<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SomosController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        
        return view('somos');
    }
}
