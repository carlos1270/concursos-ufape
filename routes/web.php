<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConcursoController;
use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\PresidenteBancaController;
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

<<<<<<< HEAD
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/user/profile', [ProfileController::class, 'showProfile'])->name('profile.show');
});
=======
Route::get('/user/profile', [ProfileController::class, 'showProfile'])->name('profile.show');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return redirect(route('index'));
})->name('dashboard');
>>>>>>> b1a3ecc423a9201c641eee59ec7369ac73b930f1

Route::middleware(['auth:sanctum', 'verified', 'CheckUserAdmin'])->group(function () {
    Route::resource('user', AdminController::class);
});

Route::middleware(['auth:sanctum', 'verified', 'CheckUserCandidato'])->group(function () {
<<<<<<< HEAD

    Route::resource('candidato', CandidatoController::class);

    Route::get('/inscricao/concurso/{concurso_id}', [CandidatoController::class, 'inscreverseConcurso'])
=======
    Route::get('/inscricao-concurso/{id}', [CandidatoController::class, 'inscreverseConcurso'])
>>>>>>> b1a3ecc423a9201c641eee59ec7369ac73b930f1
        ->name('inscricao.concurso');

    Route::post('/save-inscricao', [CandidatoController::class, 'saveInscricao'])
        ->name('save.inscricao');

    Route::get('/envio-documentos/inscricao/{inscricao_id}', [CandidatoController::class, 'showEnvioDocumentos'])
        ->name('envio.documentos.inscricao');

    Route::post('/save-documentos', [CandidatoController::class, 'saveDocumentos'])
        ->name('save.documentos');
});

<<<<<<< HEAD
Route::middleware(['auth:sanctum', 'verified', 'CheckUserChefeConcurso'])->group(function () {
    Route::get('/show-candidatos/concurso/{concurso_id}', [ConcursoController::class, 'showCandidatos'])
        ->name('show.candidatos.concurso');

    Route::get('/candidato/inscricao/{inscricao_id}', [ConcursoController::class, 'inscricaoCandidato'])
        ->name('candidato.inscricao');

    Route::post('/aprovar-reprovar-candidato/inscricao/{inscricao_id}', [ConcursoController::class, 'aprovarReprovarCandidato'])
        ->name('aprovar-reprovar-candidato.inscricao');

    Route::get('/avalia-documentos/inscricao/{inscricao_id}', [ConcursoController::class, 'avaliarDocumentosCandidato'])
        ->name('avalia.documentos.inscricao');

    Route::post('/avalia-documentos/inscricao/{inscricao_id}', [ConcursoController::class, 'savePontuacaoDocumentosCandidato'])
        ->name('avalia.documentos.inscricao');
});
=======

Route::middleware(['auth:sanctum', 'verified', 'CheckUserBancaExaminadora'])->group(function () {
    Route::get('/show-candidatos', [ConcursoController::class, 'showCandidatos'])
        ->name('show.candidatos');
>>>>>>> b1a3ecc423a9201c641eee59ec7369ac73b930f1


Route::middleware(['auth:sanctum', 'verified', 'CheckUserPresidenteBanca'])->group(function () {
    Route::get('/concursos', [PresidenteBancaController::class, 'showConcursos'])
        ->name('concursos');
});

Route::resource('concurso', ConcursoController::class);
