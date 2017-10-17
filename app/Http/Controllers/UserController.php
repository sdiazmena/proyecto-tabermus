<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Banda;
use Validator;
use App\User;
class UserController extends Controller
{
    public function profile(){
    	$iduser = \Auth::user()->id;

    	if(Banda::where('id_usuario',$iduser)->pluck('nombre')->all())
    	{
    		$banda = Banda::where('id_usuario',$iduser)->pluck('nombre')->all();
    		
    		return view('profile', array('user' => Auth::user(),'banda'=>$banda));
    	}else{
    		$banda[0] = 0;
    		return view('profile', array('user' => Auth::user(),'banda'=>$banda));
    	}

    }
    public function profileUser(){
        return view('editarperfil');
    }
    public function updateAvatar(Request $request){
        $rules = ['image' => 'required|image|max:1024*1024*1',];
        $messages = [
            'image.required' => 'La imagen es requerida',
            'image.image' => 'Formato no permitido',
            'image.max' => 'El máximo permitido es 2 MB',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        
        if ($validator->fails()){
            return redirect('/profile/user')->withErrors($validator);
        }
        else{
            $name = str_random(30) . '-' . $request->file('image')->getClientOriginalName();
            
            $request->file('image')->move('uploads/avatars', $name);
            $user = new User;
            $user->where('email', '=', Auth::user()->email)
                 ->update(['avatar' => 'uploads/avatars/'.$name]);
            return redirect('/profile')->with('status', 'Su imagen de perfil ha sido cambiada con éxito');
        }        
    }
}
