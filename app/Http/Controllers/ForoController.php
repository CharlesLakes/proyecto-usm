<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Asignatura;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class ForoController extends Controller
{
    /* Resive los datos de el creador de post para crear uno */
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

    /* Actualiza los datos de la el post o pregunta que puedas segun el permiso */
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

    /* Elimina las preguntas que puedes eliminar segun el permiso*/
    public function DeletePregunta($id){
        $preguntaEliminar = Post::find($id);

        if($preguntaEliminar->user->id != Auth::user()->id && Auth::user()->hasRole('user')){
            return back();
        }

        $preguntaEliminar->delete();
        return back();
    }
    /* Se obtienen los datos de el post o pregunta de la base de datos
        y se muestra en la vista */
    public function ReadPregunta($id){
        $pregunta = Post::find($id);
        if($pregunta == NULL){
            return redirect()->route('panel');
        }
        return view('foro.post',compact('pregunta'));
    }

    /* Recive los datos de un comentario de un post */
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

    public function DeleteComment($id){
        $comm = Comment::find($id);

        if($comm->user_id != Auth::user()->id && Auth::user()->hasRole('user')){
            return back();
        }
        $comm->delete();
        return back();
    }

    /* Llama la vista de un tema en especifico (asignatura) */
    public function tema($id){
        $asignatura = Asignatura::find($id);
        if($asignatura == NULL) {
            return redirect()->route('panel');
        }
        return view('foro.tema',compact("asignatura"));

    }

    /* Llama a la vista de el creador de post o preguntas */
    public function crearView(){
        return view('foro.creatorPost');
    }


    
}