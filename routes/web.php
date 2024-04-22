<?php

use App\Http\Controllers\AgendaController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\CadastroController;
use App\Http\Controllers\NovousuarioController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\ProfissionalController;


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
Route::prefix('/site/perfil')->group(function () {
    Route::get('/', [PerfilController::class, 'index'])->name('site.perfil');
    Route::get('/index', [PerfilController::class, 'index'])->name('site.perfil.index');
    Route::post('/index', [PerfilController::class, 'index'])->name('site.perfil.index');
    Route::get('/listar', [PerfilController::class, 'listar'])->name('site.perfil.listar');
    Route::post('/listar', [PerfilController::class, 'listar'])->name('site.perfil.listar');
    Route::get('/adicionar', [PerfilController::class, 'adicionar'])->name('site.perfil.adicionar');
    Route::post('/adicionar', [PerfilController::class, 'adicionar'])->name('site.perfil.adicionar');
    Route::get('/editar/{id}', [PerfilController::class, 'editar'])->name('site.perfil.editar');
    Route::get('/excluir/{id}', [PerfilController::class, 'excluir'])->name('site.perfil.excluir');
});


// Profissional
Route::prefix('/site/profissional')->group(function () {
    Route::get('/', [ProfissionalController::class, 'index'])->name('site.profissional');
    Route::get('/index', [ProfissionalController::class, 'index'])->name('site.profissional.index');
    Route::post('/index', [ProfissionalController::class, 'index'])->name('site.profissional.index');
    Route::get('/listar', [ProfissionalController::class, 'listar'])->name('site.profissional.listar');
    Route::post('/listar', [ProfissionalController::class, 'listar'])->name('site.profissional.listar');
    Route::get('/adicionar', [ProfissionalController::class, 'adicionar'])->name('site.profissional.adicionar');
    Route::post('/adicionar', [ProfissionalController::class, 'adicionar'])->name('site.profissional.adicionar');
    Route::get('/editar/{id}', [ProfissionalController::class, 'editar'])->name('site.profissional.editar');
    Route::get('/excluir/{id}', [ProfissionalController::class, 'excluir'])->name('site.profissional.excluir');
});

// Novo Usuário
Route::get('/site/novousuario', [NovousuarioController::class, 'index'])->name('site.novousuario');
Route::post('/site/novousuario', [NovousuarioController::class, 'index'])->name('site.novousuario');

// agenda 
Route::prefix('/site/agenda')->group(function () {
    Route::get('/', [AgendaController::class, 'adicionar'])->name('site.agenda');
    Route::get('/adicionar', [AgendaController::class, 'adicionar'])->name('site.agenda.adicionar');
    Route::post('/adicionar', [AgendaController::class, 'adicionar'])->name('site.agenda.adicionar');
    Route::get('/listar', [AgendaController::class, 'listar'])->name('site.agenda.listar');
    Route::post('/listar', [AgendaController::class, 'listar'])->name('site.agenda.listar');
    Route::get('/editar/{id}', [AgendaController::class, 'editar'])->name('site.agenda.editar');
    Route::get('/excluir/{id}', [AgendaController::class, 'excluir'])->name('site.agenda.excluir');
});