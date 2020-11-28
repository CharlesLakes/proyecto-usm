<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /* Comprobar si tiene session iniciada o no , si no manda a logeo o register */
    public function formLogin(){
        if(Auth::check()){
            return redirect()->route('index');
        }
        return view("auth.login");
    }
    public function formRegister(){
        if(Auth::check()){
            return redirect()->route('index');
        }
        return view('auth.register');
    }

    /* Procesamiento de login o regiter */
    public function processLogin(Request $request){
         /* Analizando formato */
         $credentials = $request->validate([
            'email' => 'email|required|string',
            'password' => 'required|string'
        ]);
        /* Comprobando session */
        if(Auth::attempt($credentials)){
            if(count(Auth::user()->asignaturas) == 0){
                return redirect()->route('inscripcion');
            }
            return redirect()->route('panel');
            
        }
        return back()->withErrors(['msg' => 'Email o contraseña invalida']);
    }
    public function processRegister(Request $request){
        /* Analizando formato*/
        $credentials = $request->validate([
            'username' => 'required|alpha',
            'email' => 'email|required|string',
            'password' => 'required|string|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
            're_password' => 'required|string',
        ]);
        if($credentials['password'] != $credentials['re_password']){
            return back()->withErrors(['msg' => 'La contraseñas ingresadas no coinciden.']);
        }
        if(User::where('username',$credentials['username'])->first() != NULL){
            return back()->withErrors(['msg' => 'Ya existe un usuario con ese username.']);
        }
        if(User::where('email',strtolower($credentials['email']))->first() != NULL){
            return back()->withErrors(['msg' => 'Ya existe un usuario con ese correo.']);
        }
        if(!strpos(strtolower($credentials['email']),"@usm.cl")){
            return back()->withErrors(['msg' => 'El correo ingresado no es @usm.cl']);
        }

        /* Registrando */
        User::create([
            'role' => 'user',
            'username' => $credentials['username'],
            'email' => strtolower($credentials['email']),
            'password' => $credentials['password'],
            'email_verification' => 0
        ]);

        return redirect()->route('index');


    }

    public function logout(){
        Auth::logout();
        return redirect()->route('index');
    }
    
    public function CambiarDatos(Request $request){
        //Lo que te pediran, (Lesquite lo required a la new password y renewpassword para que no sea obligatorio ponerlos si quieres cambiar otra cosa)
        $credentials = $request->validate([
            'NewUsername' => 'alpha',
            'Password' => 'required|string',
            'NewPassword' => 'string|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
            'ReNewPassword' => 'string',
        ]);
        //Verifica si la contraseña es correcta (la actual)
        if (Hash::check( $request->password, Auth::user()->password)){
            if ($credentials["NewPassword"]!="" and $credentials["NewUsername"]!=""){
                if($credentials['NewPassword'] != $credentials['ReNewPassword']){
                    return back()->withErrors(['msg' => 'La contraseñas nuevas ingresadas no coinciden.']);
                }
                if($credentials['Password'] == $credentials['NewPassword']){
                    return back()->withErrors(['msg' => 'La contraseña actual y la nueva son identicas.']);
                }
                Auth::user()->update(['username'=>$credentials['NewUsername']]);
                Auth::user()->update(['password'=>$credentials['NewPassword']]);
                return "Username y contraseña cambiada con exito.";
            }
            elseif ($credentials["NewPassword"]=="" and $credentials["NewUsername"]!="") {
                if(User::where('username',$credentials['username'])->first() != NULL){
                    return back()->withErrors(['msg' => 'Ya existe un usuario con ese username.']);
                }
                Auth::user()->update(['username'=>$credentials['NewUsername']]);
                return "Username cambiado con exito.";
            }
            else{
                if($credentials['NewPassword'] != $credentials['ReNewPassword']){
                    return back()->withErrors(['msg' => 'La contraseñas nuevas ingresadas no coinciden.']);
                }
                if($credentials['password'] == $credentials['NewPassword']){
                    return back()->withErrors(['msg' => 'La contraseña actual y la nueva son identicas.']);
                Auth::user()->update(['password'=>$credentials['NewPassword']]);
                return "contraseña cambiada con exito.";
                }
            }
        }
        else {
            return back()->withErrors(['msg' => 'La contraseña actual no corresponde.']);
        }
    }
}