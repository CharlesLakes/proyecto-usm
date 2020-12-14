<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Video;
use App\Models\Quiz;
use App\Models\Asignatura;

class PageController extends Controller
{
    public function inicio(){
        return view('page.bienvenida');
    }

    public function panel(){
        $avance = 1;

        return Auth::user()->asignatura[0]->quiz;
        return view('page.panel_inicio');
    }

    public function panelQuiz(){
        $asignaturas = Auth::user()->asignaturas;
        return view('page.panel_quiz',compact("asignaturas"));
    }

    public function panelVideo(){
        $asignaturas = Auth::user()->asignaturas;
        return view('page.panel_video',compact("asignaturas"));
    }

    public function panelForo(){

        $asignaturas =  Asignatura::get();
        return view('page.panel_foro',compact("asignaturas"));
    }
}
