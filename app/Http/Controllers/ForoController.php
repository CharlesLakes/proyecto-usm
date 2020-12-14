<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Asignatura;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class ForoController extends Controller
{
    public function CrearPregunta(Request $request){
        $pregunta = $request ->validate([
            'asunto' => 'required|string',
            'contenido' => 'required|string',
            'asignatura_id' => 'required|integer'
        ]);

        if(Asignatura::find($pregunta['asignatura_id']) == NULL){
            return "La asignatura no existe";
        }

        $post = new Post();
        $post->asunto = $pregunta['asunto'];
        $post->user_id = Auth::user()->id;
        $post->contenido = $pregunta['contenido'];
        $post->asignatura_id = $pregunta['asignatura_id'];
        $post->save();

        /*Storage::put('post/'.$post->id,base64_encode($pregunta['contenido']));
        */
        return redirect()->route("foroTema",['id' => $pregunta['asignatura_id']]);
    }

    public function UpdatePregunta(Request $request,$id){
        $pregunta = $request->validate([
            'asunto' => 'string',
            'contenido' => 'string',
            'asignatura_id' => 'integer'
        ]);

        $preguntaUpdate = Post::findOrFail($id);

        if($preguntaUpdate->user_id != Auth::user()->id){
            return "No puedes editar este post";
        }

        foreach($preguntas as $key => $value){
            if($value != ""){
                $preguntaUpdate->$key = $value;
            }
        }
        $preguntaUpdate->save();
        return 'nota editada!';
    }
    public function DeletePregunta($id){
        $preguntaEliminar = Preguntas::findOrFail($id);

        if($preguntaEliminar->user_id != Auth::user()->id && Auth::user()->hasRole('user')){
            return "No puedes eliminar este post";
        }

        $preguntaEliminar->delete();
        return 'Pregunta eliminada';
    }
    public function ReadPregunta($id){
        $pregunta = Post::find($id);
        if($pregunta == NULL){
            return redirect()->route('panel');
        }
        return view('foro.post',compact('pregunta'));
    }

    public function commentPregunta(Request $request,$id){
        $respuesta = $request->validate([
            'contenido' => 'required|string'
        ]);

        if(Post::find($id) == NULL){
            return "No exite este post";
        }

        $post = new Comment();
        $post->user_id = Auth::user()->id;
        $post->post_id = $id;
        $post->contenido = $respuesta['contenido'];
        $post->save();

        return redirect()->back();

    }


    public function tema($id){
        $asignatura = Asignatura::find($id);
        if($asignatura == NULL) {
            return redirect()->route('panel');
        }
        return view('foro.tema',compact("asignatura"));

    }

    public function crearView(){
        return view('foro.creatorPost');
    }


    
}