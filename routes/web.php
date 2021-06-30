<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConcursoController;
use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;

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

Route::get('/', [WelcomeController::class, 'index'])->name('index');

Route::get('/user/profile', [ProfileController::class, 'showProfile'])->name('profile.show');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return redirect(route('index'));
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified', 'CheckUserAdmin'])->group(function () {
    Route::get('/create-user', [AdminController::class, 'createUser'])
        ->name('create.user');

    Route::post('/save-user', [AdminController::class, 'saveUser'])
        ->name('save.user');

    Route::get('/show-users', [AdminController::class, 'showUser'])
        ->name('show.users');

    Route::get('/edit-user', [AdminController::class, 'editUser'])
        ->name('edit.user');

    Route::post('/save-edit-user', [AdminController::class, 'saveEditUser'])
        ->name('save.edit.user');

    Route::get('/delete-user/{id}', [AdminController::class, 'deleteUser'])
        ->name('delete.user');
});

Route::middleware(['auth:sanctum', 'verified', 'CheckUserCandidato'])->group(function () {
    Route::get('/inscricao-concurso/{id}', [CandidatoController::class, 'inscreverseConcurso'])
        ->name('inscricao.concurso');

    Route::post('/save-inscricao', [CandidatoController::class, 'saveInscricao'])
        ->name('save.inscricao');

    Route::get('/show-inscricoes', [CandidatoController::class, 'showInscricoes'])
        ->name('show.inscricoes');

    Route::get('/minha-inscricao', [CandidatoController::class, 'minhaInscricao'])
        ->name('minha.inscricao');

    Route::get('/envio-documentos', [CandidatoController::class, 'showEnvioDocumentos'])
        ->name('envio.documentos');
});


Route::middleware(['auth:sanctum', 'verified', 'CheckUserBancaExaminadora'])->group(function () {
    Route::get('/show-candidatos', [ConcursoController::class, 'showCandidatos'])
        ->name('show.candidatos');

    Route::get('/inscricao-candidato', [ConcursoController::class, 'inscricaoCandidato'])
        ->name('inscricao.candidato');

    Route::post('/aprovar-reprovar-candidato', [ConcursoController::class, 'aprovarReprovarCandidato'])
        ->name('aprovar-reprovar-candidato');
});

Route::resource('concurso', ConcursoController::class);
