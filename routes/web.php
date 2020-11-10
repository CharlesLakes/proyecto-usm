<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\LoginController;
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
Route::get('/',[PageController::class,'inicio'])->name('index');
Route::get("login", [LoginController::class, "formLogin"]);

Route::get("login", [LoginController::class, "formLogin"])->name("login");
Route::post("login", [LoginController::class, "processLogin"])->name("processLogin");

Route::get("register",[LoginController::class, "formRegister"])->name("register");
Route::get("register",[LoginController::class, "processRegister"])->name("processRegister");