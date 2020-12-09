<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Video;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    public function crear(Request $request){
        $respuesta = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'link' => 'required|url',
            'asignatura_id' => 'required|integer'
        ]);
        
        return $respuesta;
        $video = new Video();
        $video->title = $respuesta['title'];
        $video->description = $respuesta['description'];
        $video->link = $respuesta['link'];
        $video->user_id = Auth::user()->id;
        $video->asignatura_id = $respuesta['asignatura_id'];
        $video->save();

        return "creado";
    }
}
