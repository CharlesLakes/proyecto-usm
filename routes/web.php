<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AsignaturaController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\VideoController;
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
Route::get("/login", [LoginController::class, "formLogin"])->name("login");
Route::post("/login", [LoginController::class, "processLogin"])->name("processLogin");
Route::get("/logout",[LoginController::class, "logout"])->name("logout");

// Route register
Route::get("/register",[LoginController::class, "formRegister"])->name("register");
Route::post("/register",[LoginController::class, "processRegister"])->name("processRegister");



Route::group(['middleware' => ['auth:user']], function () {
    // Asignaturas - Usuarios
    Route::get("/asignatura/lista", [AsignaturaController::class, "obtenerAsignaturas"])->name("listaAsignaturas");
    Route::get("/asignatura/inscripcion", [AsignaturaController::class, "inscripcion"])->name("inscripcion");  
    Route::get("/asignatura/{asignatura}", [AsignaturaController::class, "asignatura"])->name("asignatura");
    Route::post("/asignatura/inscripcion", [AsignaturaController::class, "processInscripcion"])->name("processInscripcion");  
    Route::get("/panel", [PageController::class, "panel"])->name("panel");
    Route::get("/panel/quiz",[PageController::class, "panelQuiz"])->name("panelQuiz");
    Route::get("/panel/video",[PageController::class, "panelVideo"])->name("panelVideo");

    Route::get("/editar-perfil",[LoginController::class, "changeData"])->name("cambiarDatosUser");
    Route::post("/editar-perfil",[LoginController::class, "processChangeData"]);
    //Route::post("/video/create",[VideoController::class, "crear"]);

    Route::get("/quiz/{id}",[QuizController::class,"quizView"])->where(['id' => '[0-9]+']);
    Route::post("/quiz/{id}",[QuizController::class,"recibirRespuestas"])->where(['id' => '[0-9]+']);
    Route::get("/quiz/create",[QuizController::class,"crearView"])->name('creatorQuiz');
    Route::post("/quiz/create",[QuizController::class,"crear"]);

    Route::get("/video/create",[VideoController::class, "crearView"])->name("creatorVideo");
    Route::post("/video/create",[VideoController::class, "crear"]);
});


