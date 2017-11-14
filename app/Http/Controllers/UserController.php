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
        $status = NULL;
    	if(Banda::where('id_usuario',$iduser)->pluck('nombre')->all())
    	{
            $banda1 = DB::table('banda')->where('id_usuario', $iduser)->first();
    		$banda = Banda::where('id_usuario',$iduser)->pluck('nombre')->all();

    		return view('profile', array('user' => Auth::user(),'banda'=>$banda,'banda1'=>$banda1))->with('status',$status);
    	}else{
    		$banda[0] = 0;
    		return view('profile', array('user' => Auth::user(),'banda'=>$banda))->with('status',$status);
    	}

    }
    public function profileUser(){
        return view('editarperfil', array('user' => Auth::user()));
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
                 ->update(['avatar' => $name]);
            return redirect('/profile')->with('status', 'Su imagen de perfil ha sido cambiada con éxito');
        }        
    }
    public function updateProfile(Request $request){
        $user = new User;
        $user->where('email','=', Auth::user()->email)
             ->update(['name' => $request->nombre]);
        return redirect('/profile')->with('status', 'Su perfil ha sido modificado con éxito');       
    }
}
