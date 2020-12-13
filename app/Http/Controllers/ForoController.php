<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Preguntas;
class ForoController extends Controller
{
    public function CrearPregunta(Request $request){
        $pregunta = $request ->validate([
            'asunto' => 'required|string',
            'descripcion' => 'required|string',
            'asignatura_id' => 'required'
        ]);
        Preguntas::create([
            'asunto' => $pregunta['asunto'],
            'descripcion' => $pregunta['descripcion'],
            'user_id' => Auth::user()->id,
            'asignatura_id'=>$pregunta['asignatura_id']
        ]);
        return 'Pregunta creada';
    }

    public function UpdatePregunta($id){
        $preguntaUpdate = Preguntas::findOrFail($id);
        $preguntaUpdate->asunto = $request->asunto;
        $preguntaUpdate->descripcion = $request->descripcion;
        $preguntaUpdate->save();
        return 'nota editada!';
    }
    public function DeletePregunta($id){
        $preguntaEliminar = Preguntas::findOrFail($id);
        $preguntaEliminar->delete();
        return 'Pregunta eliminada';
    }
    public function ReadPregunta($id){
        
    }


    
}