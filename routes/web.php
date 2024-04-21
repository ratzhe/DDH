<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\CadastroController;
use App\Http\Controllers\Educador;
use App\Http\Controllers\EducadorController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\NovoeducadorController;
use App\Http\Controllers\NovomedicoController;
use App\Http\Controllers\NovonutricionistaController;
use App\Http\Controllers\NovousuarioController;
use App\Http\Controllers\NutricionistaController;
use App\Http\Controllers\PerfilController;
use App\Models\Medico;
use App\Models\Nutricionista;

//Login
Route::get('/site/login/{erro?}', [LoginController::class, 'index'])->name('site.login');
Route::post('/site/login', [LoginController::class, 'autenticar'])->name('site.login');

// Login reset Senha 
Route::match(['get', 'post'], '/site/recuperarsenha', [LoginController::class, 'recuperarsenha'])->name('site.recuperarsenha');
Route::get('/reset-password/{token}', [LoginController::class, 'reiniciarsenha'])->middleware('guest')->name('password.reset');
Route::post('/site/trocarsenha', [LoginController::class, 'trocarsenha'])->middleware('guest')->name('trocarsenha');

// Cadastro de Usuário Administrador
Route::get('/site/cadastro', [CadastroController::class, 'cadastrar'])->name('site.cadastro');
Route::post('/site/cadastro', [CadastroController::class, 'salvar'])->name('site.cadastro');

// Perfil

// Novo Usuário
Route::get('/site/novousuario', [NovousuarioController::class, 'index'])->name('site.novousuario');
Route::post('/site/novousuario', [NovousuarioController::class, 'index'])->name('site.novousuario');

// Perfil 
Route::prefix('/site/perfil')->group(function () {
    Route::get('/', [PerfilController::class, 'index'])->name('site.perfil.index');
    Route::get('/index', [PerfilController::class, 'index'])->name('site.perfil.index');
    Route::post('/index', [PerfilController::class, 'index'])->name('site.perfil.index');
    Route::get('/listar', [PerfilController::class, 'listar'])->name('site.perfil.listar');
    Route::post('/listar', [PerfilController::class, 'listar'])->name('site.perfil.listar');
    Route::get('/adicionar', [PerfilController::class, 'adicionar'])->name('site.perfil.adicionar');
    Route::post('/adicionar', [PerfilController::class, 'adicionar'])->name('site.perfil.adicionar');
    Route::get('/editar/{id}', [PerfilController::class, 'editar'])->name('site.perfil.editar');
    Route::get('/excluir/{id}', [PerfilController::class, 'excluir'])->name('site.perfil.excluir');
});

// Médico
Route::prefix('/site/medico')->group(function () {
    Route::get('/', [MedicoController::class, 'index'])->name('site.medico.index');
    Route::get('/index', [MedicoController::class, 'index'])->name('site.medico.index');
    Route::post('/index', [MedicoController::class, 'index'])->name('site.medico.index');
    Route::get('/listar', [MedicoController::class, 'listar'])->name('site.medico.listar');
    Route::post('/listar', [MedicoController::class, 'listar'])->name('site.medico.listar');
    Route::get('/adicionar', [MedicoController::class, 'adicionar'])->name('site.medico.adicionar');
    Route::post('/adicionar', [MedicoController::class, 'adicionar'])->name('site.medico.adicionar');
    Route::get('/editar/{id}', [MedicoController::class, 'editar'])->name('site.medico.editar');
    Route::get('/excluir/{id}', [MedicoController::class, 'excluir'])->name('site.medico.excluir');
});


// Nutricionista
Route::prefix('/site/nutricionista')->group(function () {
    Route::get('/', [NutricionistaController::class, 'index'])->name('site.nutricionista.index');
    Route::get('/index', [NutricionistaController::class, 'index'])->name('site.nutricionista.index');
    Route::post('/index', [NutricionistaController::class, 'index'])->name('site.nutricionista.index');
    Route::get('/listar', [NutricionistaController::class, 'listar'])->name('site.nutricionista.listar');
    Route::post('/listar', [NutricionistaController::class, 'listar'])->name('site.nutricionista.listar');
    Route::get('/incluir', [NutricionistaController::class, 'adicionar'])->name('site.nutricionista.incluir');
    Route::post('/incluir', [NutricionistaController::class, 'adicionar'])->name('site.nutricionista.incluir');
    Route::get('/editar/{id}', [NutricionistaController::class, 'editar'])->name('site.nutricionista.editar');
    Route::get('/excluir/{id}', [NutricionistaController::class, 'excluir'])->name('site.nutricionista.excluir');
    Route::get('/teste', [NutricionistaController::class, 'teste'])->name('site.nutricionista.teste');
});

// Educador Físico
Route::prefix('/site/educador')->group(function () {
    Route::get('/', [EducadorController::class, 'index'])->name('site.educador.index');
    Route::get('/index', [EducadorController::class, 'index'])->name('site.educador.index');
    Route::post('/index', [EducadorController::class, 'index'])->name('site.educador.index');
    Route::get('/listar', [EducadorController::class, 'listar'])->name('site.educador.listar');
    Route::post('/listar', [EducadorController::class, 'listar'])->name('site.educador.listar');
    Route::get('/adicionar', [EducadorController::class, 'adicionar'])->name('site.educador.adicionar');
    Route::post('/adicionar', [EducadorController::class, 'adicionar'])->name('site.educador.adicionar');
    Route::get('/editar/{id}', [EducadorController::class, 'editar'])->name('site.educador.editar');
    Route::get('/excluir/{id}', [EducadorController::class, 'excluir'])->name('site.educador.excluir');
});