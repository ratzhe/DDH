<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\CadastroController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\NovoeducadorController;
use App\Http\Controllers\NovomedicoController;
use App\Http\Controllers\NovonutricionistaController;
use App\Http\Controllers\NovousuarioController;
use App\Http\Controllers\PerfilController;
use App\Models\Medico;

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

Route::get('/site/login/{erro?}', [LoginController::class, 'index'])->name('site.login');
Route::post('/site/login', [LoginController::class, 'autenticar'])->name('site.login');


Route::match(['get', 'post'], '/site/recuperarsenha', [LoginController::class, 'recuperarsenha'])->name('site.recuperarsenha');
Route::get('/reset-password/{token}', [LoginController::class, 'reiniciarsenha'])->middleware('guest')->name('password.reset');
Route::post('/site/trocarsenha', [LoginController::class, 'trocarsenha'])->middleware('guest')->name('trocarsenha');

Route::get('/site/cadastro', [CadastroController::class, 'cadastrar'])->name('site.cadastro');
Route::post('/site/cadastro', [CadastroController::class, 'salvar'])->name('site.cadastro');

//Route::get('/site/novomedico', [NovomedicoController::class, 'cadastrar'])->name('site.medico');
//Route::post('/site/novomedico', [NovomedicoController::class, 'salvar'])->name('site.medico');

Route::get('/site/perfil', [PerfilController::class, 'index'])->name('site.perfil');
Route::post('/site/perfil', [PerfilController::class, 'index'])->name('site.perfil');

Route::get('/site/novousuario', [NovousuarioController::class, 'index'])->name('site.novousuario');
Route::post('/site/novousuario', [NovousuarioController::class, 'index'])->name('site.novousuario');

Route::get('/site/novomedico', [NovomedicoController::class, 'index'])->name('site.novomedico');
Route::post('/site/novomedico', [NovomedicoController::class, 'index'])->name('site.novomedico');

Route::get('/site/novonutricionista', [NovonutricionistaController::class, 'index'])->name('site.novonutricionista');
Route::post('/site/novonutricionista', [NovonutricionistaController::class, 'index'])->name('site.novonutricionista');

Route::get('/site/novoeducador', [NovoeducadorController::class, 'index'])->name('site.novoeducador');
Route::post('/site/novoeducador', [NovoeducadorController::class, 'index'])->name('site.novoeducador');