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
    /* LLama a la vista de bienvenida */
    public function inicio(){
        return view('page.bienvenida');
    }

    /* Llama a la vista de el panel */
    public function panel(){
        $total = 20; // Cantidad de quiz por mes
        $data = []; // Se guardan los datos de los avances

        $fecha = new \DateTime("now"); //Fecha actual
      
        // Se recorren los quiz que a realizado el usuario para contarlos 
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
        
        $asignaturas = Auth::user()->asignaturas; // Todas las asignaturas inscritas

        $leaderboard = []; // la tavla de los puntajes

        // Se cuentan los quiz hechos por el usuario en total
        foreach(User::get() as $user){
            $leaderboard[] = [
                'obj' => $user,
                'puntaje' =>count($user->quiz)
            ];
        }

        // 
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
