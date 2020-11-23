<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Asignatura;



class AsignaturaController extends Controller
{
    public function asignatura(Request $request,$asignatura){
        return json_encode(Auth::user()->asignaturas);

        
    }
    public function inscripcion(){
        return "Hola mundo";
    }
    public function processInscripcion(Request $request){
        $inputs = $request([
            'listaAsignatura' => 'required|array'
        ]);
        
        $inscritas = [];

        foreach ($inputs['listaAsignatura'] as $value) {
            if(Asignatura::where('id',$value)->first() != NULL){
                $inscritas[] = $value;
            }
        }
        Auth::user()->truncate();
        Auth::user()->asignaturas()->attach($inscritas);
        
        return redirect()->route('panel');
    }
}
