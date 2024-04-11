<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\CadastroController;
use App\Http\Controllers\PerfilController;

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

Route::get('/', function () {return 'Teste';});

Route::get('/site/login/{erro?}', [LoginController::class, 'index'])->name('site.login');
Route::post('/site/login', [LoginController::class, 'autenticar'])->name('site.login');


Route::match(['get', 'post'], '/site/recuperarsenha', [LoginController::class, 'recuperarsenha'])->name('site.recuperarsenha');
Route::get('/reset-password/{token}', [LoginController::class, 'reiniciarsenha'])->middleware('guest')->name('password.reset');
Route::post('/site/trocarsenha', [LoginController::class, 'trocarsenha'])->middleware('guest')->name('trocarsenha');

Route::get('/site/cadastro', [CadastroController::class, 'cadastrar'])->name('site.cadastro');
Route::post('/site/cadastro', [CadastroController::class, 'salvar'])->name('site.cadastro');

Route::get('/site/perfil', [PerfilController::class, 'index'])->name('site.perfil');


