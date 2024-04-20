<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\CadastroController;
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
Route::get('/site/perfil', [PerfilController::class, 'index'])->name('site.perfil');
Route::post('/site/perfil', [PerfilController::class, 'index'])->name('site.perfil');

// Novo Usuário
Route::get('/site/novousuario', [NovousuarioController::class, 'index'])->name('site.novousuario');
Route::post('/site/novousuario', [NovousuarioController::class, 'index'])->name('site.novousuario');

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
    Route::get('/adicionar', [NutricionistaController::class, 'adicionar'])->name('site.nutricionista.adicionar');
    Route::post('/adicionar', [NutricionistaController::class, 'adicionar'])->name('site.nutricionista.adicionar');
    Route::get('/editar/{id}', [NutricionistaController::class, 'editar'])->name('site.nutricionista.editar');
    Route::get('/excluir/{id}', [NutricionistaController::class, 'excluir'])->name('site.nutricionista.excluir');
});

// Educador Físico
