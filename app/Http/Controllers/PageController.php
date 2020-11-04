<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function inicio(){

        return "Hola mundo";
        /*
        if(Auth::check()){
            
            return view('user.index');
        }
        return view('index');
        */
    }
}
