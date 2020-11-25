<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function inicio(){
        return view('page.bienvenida');
    }

    public function panel(){
        return "logeado";
    }
}
