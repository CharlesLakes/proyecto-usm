<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Video;
use App\Models\User;
use App\Models\Quiz;
use App\Models\Asignatura;

class PageController extends Controller
{
    public function inicio(){
        return view('page.bienvenida');
    }

    public function panel(){
        $total = 20;
        $data = [];

        $fecha = new \DateTime("now");
      
        foreach(Auth::user()->quiz as $item){
            $temp_fecha = new \DateTime($item->pivot->get()[0]->created_at);
            if($temp_fecha->format("y-m") == $fecha->format("y-m")){
                if(!array_key_exists($item->asignatura->sigla,$data)){
                    $data[$item->asignatura->sigla] = 0;
                }
                if($data[$item->asignatura->sigla] <= $total){
                    $data[$item->asignatura->sigla] += 1;
                }
            };      
        }
        
        $asignaturas = Auth::user()->asignaturas;

        $leaderboard = [];

        foreach(User::get() as $user){
            $leaderboard[] = [
                'obj' => $user,
                'puntaje' =>count($user->quiz)
            ];
        }

        $leaderboard =  collect($leaderboard)->sortBy('puntaje')->reverse()->toArray();
        $leaderboard = \array_slice($leaderboard,0,5,FALSE);


        return view('page.panel_inicio',compact("data","total","asignaturas","leaderboard"));
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
