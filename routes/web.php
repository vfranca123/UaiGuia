<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CadastroController;

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
Route::get('/',[DashboardController::class, 'index']);

Route::get('/locais',[DashboardController::class, 'locaisIndex'])->name('locais.index');

//---login---
Route::get('/Login',[LoginController::class, 'loginIndex'])->name('login.index');

//---EndLogin---

//---Cadastro---
Route::get('/Cadastro',[CadastroController::class, 'cadastroUsuarioIndex'])->name('cadastroUsuario.index');

//---EndCadastro---

