<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Asignatura;



class AsignaturaController extends Controller
{
    public function obtenerAsignaturas(){
        $respuesta = Asignatura::all();
        $lista = [];
        foreach($respuesta as $item){
            $lista[] = array(
                'id' => $item['id'],
                'sigla' => $item['sigla']
            );
        }
        return $lista;

        
    }
    public function inscripcion(){
        return view('page.inscAsignatura');
    }
    public function processInscripcion(Request $request){
        $inputs = $request->input('listaAsignatura');

        if($inputs === NULL){
            return "Error de petición";
        };

        $inscritas = [];

        foreach ($inputs as $value) {
            if(Asignatura::where('id',$value)->first() != NULL){
                $inscritas[] = $value['id'];
            }
        }
        Auth::user()->asignaturas()->attach($inscritas);
        
        return redirect()->route('panel');
    }
}
