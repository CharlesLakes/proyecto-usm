<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Video;
use Illuminate\Support\Facades\Auth;
use App\Models\Asignatura;

class VideoController extends Controller
{
    public function crear(Request $request){
        $respuesta = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'link' => 'required|url',
            'asignatura_id' => 'required|integer'
        ]);
        
        if(!preg_match('/http(?:s?):\\/\\/(?:www\\.)?youtu(?:be\\.com\\/watch\\?v=|\\.be\\/)([\\w\\-\\_]*)(&(amp;)?\u200c\u200b[\\w\\?\u200c\u200b=]*)?/',$respuesta["link"])){
            return "El link ingresado no es de youtube";
        }

        if(Asignatura::where('id',$respuesta['asignatura_id'])->first() == NULL){
            return "La asignatura no existe";
        }

        $video = new Video();
        $video->title = $respuesta['title'];
        $video->description = $respuesta['description'];
        $video->link = $respuesta['link'];
        $video->user_id = Auth::user()->id;
        $video->asignatura_id = $respuesta['asignatura_id'];
        $video->save();

        return "creado";
    }
    public function viewVideo($id){
        return $id;
    }
}
