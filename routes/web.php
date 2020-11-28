<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AsignaturaController;
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
Route::get("/logout",[LoginController::class, "logout"]);

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
});


