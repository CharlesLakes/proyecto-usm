<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Asignatura;



class AsignaturaController extends Controller
{
    /* Obtiene la lista de todas las asignaturas solo obteniendo la sigla y la id */
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
    
    /* La pagina de inscripcion a la asignatura */
    public function inscripcion(){
        return view('page.inscAsignatura');
    }

    /* Procesa la inscripcion de las asignatuas */
    public function processInscripcion(Request $request){

        $inputs = $request->input('listaAsignatura');

        if($inputs === NULL){
            return "Error de petición";
        };

        $inscritas = [];

        foreach ($inputs as $value) {
            /* Se comprueba si la asignatura existe y que no te hayas inscrito antes */
            if(Asignatura::where('id',$value)->first() != NULL 
            && Auth::user()->asignatura()->where('id',$value)->first() == NULL){
                $inscritas[] = $value['id'];
            }
        }
        Auth::user()->asignaturas()->attach($inscritas);
        
        return redirect()->route('panel');
    }
}
