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
Route::get('/',[DashboardController::class, 'index'])->name('index');

Route::get('/locais',[DashboardController::class, 'locaisIndex'])->name('locais.index');

//---login---
Route::get('/Login',[LoginController::class, 'loginIndex'])->name('login.index');
Route::get('/login/authenticate', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
//---EndLogin---

//---Cadastro---
Route::get('/Cadastro',[CadastroController::class, 'cadastroIndex'])->name('cadastro.index');
Route::post('/CadastroStore',[CadastroController::class, 'cadastroStore'])->name('cadastro.store');

//---EndCadastro---

