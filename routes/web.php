<?php

use App\Http\Controllers\AgendaController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\CadastroController;
use App\Http\Controllers\NovousuarioController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\ProfissionalController;
use App\Http\Middleware\AuthenticateCustom;


//Login
Route::get('/site/login/{erro?}', [LoginController::class, 'index'])->name('site.login');
Route::post('/site/login', [LoginController::class, 'autenticar'])->name('site.login');

// erro rota
Route::get('/site/errorota', [LoginController::class, 'errorota'])->name('site.errorota');

// Login reset Senha 
Route::match(['get', 'post'], '/site/recuperarsenha', [LoginController::class, 'recuperarsenha'])->name('site.recuperarsenha');
Route::get('/reset-password/{token}', [LoginController::class, 'reiniciarsenha'])->middleware('guest')->name('password.reset');
Route::post('/site/trocarsenha', [LoginController::class, 'trocarsenha'])->middleware('guest')->name('trocarsenha');

// Cadastro de Usuário Administrador
Route::get('/site/cadastro', [CadastroController::class, 'cadastrar'])->name('site.cadastro');
Route::post('/site/cadastro', [CadastroController::class, 'salvar'])->name('site.cadastro');

// Perfil 
Route::prefix('/site/perfil')->middleware([AuthenticateCustom::class])->group(function () {
    Route::get('/', [PerfilController::class, 'index'])->name('site.perfil');
    Route::get('/index', [PerfilController::class, 'index'])->name('site.perfil.index');
    Route::post('/index', [PerfilController::class, 'index'])->name('site.perfil.index');
    Route::get('/editar/{id}', [PerfilController::class, 'editar'])->name('site.perfil.editar');
});


// Profissional
Route::prefix('/site/profissional')->middleware([AuthenticateCustom::class])->group(function () {
    Route::get('/listar', [ProfissionalController::class, 'listar'])->name('site.profissional.listar');
    Route::post('/listar', [ProfissionalController::class, 'listar'])->name('site.profissional.listar');
    Route::get('/adicionar', [ProfissionalController::class, 'adicionar'])->name('site.profissional.adicionar');
    Route::post('/adicionar', [ProfissionalController::class, 'adicionar'])->name('site.profissional.adicionar');
    Route::get('/editar/{id}', [ProfissionalController::class, 'editar'])->name('site.profissional.editar');
    Route::get('/excluir/{id}', [ProfissionalController::class, 'excluir'])->name('site.profissional.excluir');
});

// Novo Usuário
Route::prefix('/site/novousuario')->middleware([AuthenticateCustom::class])->group(function () {
    Route::get('/', [NovousuarioController::class, 'index'])->name('site.novousuario');
    Route::post('/', [NovousuarioController::class, 'index']);
});

// agenda 
Route::prefix('/site/agenda')->middleware([AuthenticateCustom::class])->group(function () {
    Route::get('/', [AgendaController::class, 'adicionar'])->name('site.agenda');
    Route::get('/adicionar', [AgendaController::class, 'adicionar'])->name('site.agenda.adicionar');
    Route::post('/adicionar', [AgendaController::class, 'adicionar'])->name('site.agenda.adicionar');
    Route::get('/listar', [AgendaController::class, 'listar'])->name('site.agenda.listar');
    Route::post('/listar', [AgendaController::class, 'listar'])->name('site.agenda.listar');
    Route::get('/editar/{id}', [AgendaController::class, 'editar'])->name('site.agenda.editar');
    Route::get('/excluir/{id}', [AgendaController::class, 'excluir'])->name('site.agenda.excluir');
});