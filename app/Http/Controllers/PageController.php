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
        return view('page.panel_inicio');
    }

    public function panelQuiz(){
        $asignaturas = [];
        foreach(Auth::user()->asignaturas as $item){
            
            $asignaturas[$item->sigla] = Quiz::where('asignatura_id',$item->id)->get();
        }

        return view('page.panel_quiz',compact("asignaturas"));
    }

    public function panelVideo(){
        $asignaturas = [];
        foreach(Auth::user()->asignaturas as $item){
            $asignaturas[$item->sigla] = Video::where('asignatura_id',$item->id)->get();
        }

        return view('page.panel_video',compact("asignaturas"));
    }
}
