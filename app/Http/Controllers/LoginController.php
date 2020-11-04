<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
    public function processLogin(){
         /* Analizando formato */
         $credentials = $request->validate([
            'email' => 'email|required|string',
            'password' => 'required|string'
        ]);
        /* Comprobando session */
        if(Auth::attempt($credentials)){
            return redirect()->route('index');
        }
        return back()->withErrors(['msg' => 'Email o contraseña invalida']);
    }
    public function processRegister(Request $request){
        /* Analizando formato*/
        $credentials = $request->validate([
            'username' => 'required|alpha',
            'email' => 'email|required|string',
            'name' => 'required|string',
            'password' => 'required|string',
            're_password' => 'required|string',
        ]);

        if($credentials['password'] != $credentials['re_password']){
            return back()->withErrors(['msg','La controseñas ingresadas no coinciden.']);
        }
        if(User::where('username',$credentials['username'])->first() != NULL){
            return back()->withErrors(['msg','Ya existe un usuario con ese username.']);
        }
        if(User::where('email',$credentials['email'])->first() != NULL){
            return back()->withErrors(['msg','Ya existe un usuario con ese correo.']);
        }

        /* Registrando */
        User::create([
            'username' => $credentials['username'],
            'email' => $credentials['email'],
            'password' => $credentials['password'],
            'name' => strtoupper($credentials['full_name'])
        ]);

        return redirect()->route('index');


    }

    public function logout(){
        Auth::logout();
        return redirect()->route('index');
    }
}
