<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Asignatura;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{

    public function crearView(){
        return view('page.creatorQuiz');
    }

    public function crear(Request $request){
        $respuesta = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'asignatura_id' => 'required|integer',
            'questions' => 'required|array',
            'questions.*.contenido' => 'required|string',
            'questions.*.respuestas' => 'required|array',
            'questions.*.correcta' => 'required|integer'
        ]);

        if(Asignatura::find($respuesta['asignatura_id']) == NULL){
            return back()->withErrors(['msg' => 'La asignatura ingresada no existe.']);
        }

       Quiz::create([
           'title' => $respuesta['title'],
           'description' => $respuesta['description'],
           'asignatura_id' => $respuesta['asignatura_id'],
           'user_id' => Auth::user()->id,
           'questions' => json_encode($respuesta['questions'])
       ]);

       return redirect()->route('panelQuiz');
    }

    public function recibirRespuestas(Request $request,$id_quiz){
        $respuesta = $request->validate([
            'respuestas' => 'required|array',
            'respuestas.*.value' => 'required|integer'
        ]);
        
        $quiz =  Quiz::find($id_quiz);
        if($quiz == NULL){
            return "Quiz no existe";
        }

        $quiz = $quiz->questions;
        $puntos = 0;
        $totales = 0;
        foreach(json_decode($quiz,1) as $key => $value){
            $totales++;
            if(array_key_exists($key,$respuesta["respuestas"]) && $value["correcta"] == $respuesta["respuestas"][$key]["value"]){
                $puntos++;
            }
        }
    

        Auth::user()->quiz()->attach($id_quiz,['points' => $puntos,'total' => $totales]);

        return array(
            'puntos' => $puntos,
            'totales' => $totales
        );
    }

    public function quizView($id){
        $quiz =  Quiz::find($id);
        if($quiz == NULL) return redirect()->route('panel');
        $json_quiz = [];
        foreach(json_decode($quiz->questions) as $key => $value){
            $json_quiz[$key] = [
                'numero' => $key,
                'contenido' => $value->contenido,
                'respuestas' => $value->respuestas
            ];
        };
        return view('page.quiz',compact("json_quiz","id"));
    }
}
