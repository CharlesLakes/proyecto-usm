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

        $leaderboard = []; // la tabla de los puntajes

        // Se cuentan los quiz hechos por el usuario en total
        foreach(User::get() as $user){
            $leaderboard[] = [
                'obj' => $user,
                'puntaje' =>count($user->quiz)
            ];
        }

        // Se obtiuenen los mejores 5 puntajes 
        $leaderboard =  collect($leaderboard)->sortBy('puntaje')->reverse()->slice(0,5);

        // Se guarda los videos recomendados
        $videos = collect();
        
        foreach($asignaturas as $asignatura){
            $videos = $videos->merge(
                $asignatura->video
            );
        }
        /* Se toman los 5 videos mas recientes */
        $videos = $videos->sortByDesc('created_at')->slice(0,5);

        return view('page.inicio',compact("data","total","videos","asignaturas","leaderboard"));
    }

    /* se llama a la vista que tendra todos los quiz segun asignatura */
    public function panelQuiz(){
        $asignaturas = Auth::user()->asignaturas;
        return view('panel.quiz',compact("asignaturas"));
    }

    /* Se llama a la vista que tengra todos los videos segun asignatura */
    public function panelVideo(){
        $asignaturas = Auth::user()->asignaturas;
        return view('panel.video',compact("asignaturas"));
    }

    /* Se lalama a la vista de el foro que se divide segun asignaturas */
    public function panelForo(){
        $asignaturas =  Auth::user()->asignaturas;
        return view('panel.foro',compact("asignaturas"));
    }
}
