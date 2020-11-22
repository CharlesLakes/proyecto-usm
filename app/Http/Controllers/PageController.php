<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function inicio(){
        if(Auth::check()){
            return "Logeado - <a href='/logout'>cerrar sesión</a>";
        }
        return "No logeado - <a href='/login'>Login</a>";
        /*
        if(Auth::check()){
            
            return view('user.index');
        }
        return view('index');
        */
    }
    public function panel(){
        return "logeado";
    }
}
