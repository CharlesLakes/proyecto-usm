<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /* Comprobar si tiene session iniciada o no , si no manda a logeo o register */
    public function formLogin(){
        if(Auth::check()){
            return redirect()->route('panel');
        }
        return view("auth.login");
    }
    public function formRegister(){
        if(Auth::check()){
            return redirect()->route('index');
        }
        return view('auth.register');
    }

    /* Procesamiento de login o regiter */
    public function processLogin(Request $request){
         /* Analizando formato */
         $credentials = $request->validate([
            'email' => 'email|required|string',
            'password' => 'required|string'
        ]);
        /* Comprobando session */
        if(Auth::attempt($credentials)){
            if(count(Auth::user()->asignaturas) < 1){
                return redirect()->route('inscripcion');
            }
            return redirect()->route('panel');
            
        }
        return back()->withErrors(['msg' => 'Email o contraseña invalida']);
    }
    public function processRegister(Request $request){
        /* Analizando formato*/
        $credentials = $request->validate([
            'username' => 'required|alpha',
            'email' => 'email|required|string',
            'password' => 'required|string|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
            're_password' => 'required|string',
        ]);
        if($credentials['password'] != $credentials['re_password']){
            return back()->withErrors(['msg' => 'La contraseñas ingresadas no coinciden.']);
        }
        if(User::where('username',$credentials['username'])->first() != NULL){
            return back()->withErrors(['msg' => 'Ya existe un usuario con ese username.']);
        }
        if(User::where('email',strtolower($credentials['email']))->first() != NULL){
            return back()->withErrors(['msg' => 'Ya existe un usuario con ese correo.']);
        }
        if(!strpos(strtolower($credentials['email']),"@usm.cl")){
            return back()->withErrors(['msg' => 'El correo ingresado no es @usm.cl']);
        }

        /* Registrando */
        User::create([
            'role' => 'user',
            'image_user' => '',
            'username' => $credentials['username'],
            'email' => strtolower($credentials['email']),
            'password' => $credentials['password'],
            'email_verification' => 0
        ]);

        return redirect()->route('index');


    }

    public function logout(){
        Auth::logout();
        return redirect()->route('index');
    }
    
    public function changeData(){
        return view('auth.changeData');
    }

    public function processChangeData(Request $request){
        //Lo que te pediran, (Lesquite lo required a la new password y renewpassword para que no sea obligatorio ponerlos si quieres cambiar otra cosa)
        $credentials = $request->all();
        //Verifica si la contraseña es correcta (la actual)
        if (Hash::check( $credentials["password"], Auth::user()->password)){
            $updates = [];
            foreach($credentials as $key => $value){
                if($value != NULL){
                    switch ($key) {
                        case 'newUsername':
                            if(User::where('username',$value)->first() != NULL){
                                return back()->withErrors(['msg' => 'Ya existe un usuario con ese username.']);
                            }
                            $updates['username'] = $value;
                            break;
                    
                        case 'newPassword':
                            if(preg_match("/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/",$value)){
                                return back()->withErrors(['msg' => 'La contraseña nueva tiene un formato incorrecto.']);
                            }
                            if($value != $credentials['reNewPassword']){
                                return back()->withErrors(['msg' => 'La contraseñas nuevas ingresadas no coinciden.']);
                            }
                            if($value != $credentials['password']){
                                return back()->withErrors(['msg' => 'La contraseña actual y la nueva son identicas.']);
                            }
                            $updates['password'] = $value;
                            break;
                        case 'imageUser':
                            Storage::put('image_user/'.Auth::user()->id, $value);
                            $updates['image_user'] = 'image_user/'.Auth::user()->id;
                            break;
                    }
                }
            }
        }else{
            return back()->withErrors(['msg' => 'La contraseña no es la correcta.']);
        }
        Auth::user()->update($updates);
        return redirect()->route('panel');
        
    }

    public function getImageUser($id){
        $user = User::find($id);
        if($user == NULL){
            return response()->json([
                'message' => 'usuario inexistente.',
                500
            ]);
        }

        if($user->image_user == ''){
            return redirect("https://www.softzone.es/app/uploads/2018/04/guest.png");
        }

        return response(\base64_decode(str_replace('data:image/png;base64,','',(Storage::get($user->image_user))))
                )->withHeaders([
                    'content-type' => 'image/png'
                ]);
    }


}