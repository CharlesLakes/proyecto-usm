<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AsignaturaController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\ForoController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route web
Route::get("/",[PageController::class,'inicio'])->name('index');

// Route Login
Route::get("/login", [UserController::class, "formLogin"])->name("login");
Route::post("/login", [UserController::class, "processLogin"])->name("processLogin");
Route::get("/logout",[UserController::class, "logout"])->name("logout");

// Route register
Route::get("/register",[UserController::class, "formRegister"])->name("register");
Route::post("/register",[UserController::class, "processRegister"])->name("processRegister");



Route::group(['middleware' => ['auth:user']], function () {
    // Asignaturas - Usuarios
    Route::get("/asignatura/lista", [AsignaturaController::class, "obtenerAsignaturas"])->name("listaAsignaturas");
    Route::get("/asignatura/inscripcion", [AsignaturaController::class, "inscripcion"])->name("inscripcion");  
    Route::get("/asignatura/{asignatura}", [AsignaturaController::class, "asignatura"])->name("asignatura");
    Route::post("/asignatura/inscripcion", [AsignaturaController::class, "processInscripcion"])->name("processInscripcion");  
    
    Route::get("/panel", [PageController::class, "panel"])->name("panel");
    Route::get("/panel/quiz",[PageController::class, "panelQuiz"])->name("panelQuiz");
    Route::get("/panel/video",[PageController::class, "panelVideo"])->name("panelVideo");
    Route::get("/panel/foro",[PageController::class,"panelForo"])->name("panelForo");

    Route::get("/editar-perfil",[UserController::class, "changeData"])->name("cambiarDatosUser");
    Route::post("/editar-perfil",[UserController::class, "processChangeData"]);
    //Route::post("/video/create",[VideoController::class, "crear"]);

    Route::get("/quiz/{id}",[QuizController::class,"quizView"])->where(['id' => '[0-9]+'])->name("quizId");
    Route::post("/quiz/{id}",[QuizController::class,"recibirRespuestas"])->where(['id' => '[0-9]+']);
    Route::get("/quiz/create",[QuizController::class,"crearView"])->name('creatorQuiz');
    Route::post("/quiz/create",[QuizController::class,"crear"]);

    Route::get("/video/create",[VideoController::class, "crearView"])->name("creatorVideo");
    Route::post("/video/create",[VideoController::class, "crear"]);

    Route::get("/foro/post/create",[ForoController::class, "crearView"])->name("creatorPost");
    Route::post("/foro/post/create",[ForoController::class, "CrearPregunta"]);


    Route::get("/foro/tema/{id}",[ForoController::class, "tema"])->name("foroTema");
    Route::get("/foro/post/{id}",[ForoController::class, "ReadPregunta"])->where(['id' => '[0-9]+'])->name("foroPost");
    Route::post("/foro/post/{id}",[ForoController::class, "commentPregunta"])->where(['id' => '[0-9]+']);

    Route::get("/user/image/{id}",[UserController::class, "getImageUser"])->name("imageUser");
    
});


