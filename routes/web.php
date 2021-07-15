<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConcursoController;
use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ArquivoController;

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

Route::get('/sobre', function () {
    return view('about');
})->name('about');

Route::get('/dashboard', function () {
    return redirect(route('index'));
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/user-password-edit', [ProfileController::class, 'showPassword'])->name('user.password.edit');
});

Route::middleware(['auth:sanctum', 'verified', 'CheckUserAdmin'])->group(function () {
    Route::resource('user', AdminController::class);
});

Route::middleware(['auth:sanctum', 'verified', 'CheckUserCandidato'])->group(function () {

    Route::resource('candidato', CandidatoController::class);

    Route::get('/user-profile-edit', [ProfileController::class, 'showProfileInfo'])->name('user.profile.edit');

    Route::post('/user-profile-update', [ProfileController::class, 'updateProfileInfo'])->name('user.profile.update');

    Route::get('/inscricao/concurso/{concurso_id}', [CandidatoController::class, 'inscreverseConcurso'])
        ->name('inscricao.concurso');

    Route::post('/save-inscricao', [CandidatoController::class, 'saveInscricao'])
        ->name('save.inscricao');

    Route::get('/envio-documentos/inscricao/{inscricao_id}', [CandidatoController::class, 'showEnvioDocumentos'])
        ->name('envio.documentos.inscricao');

    Route::post('/save-documentos', [ArquivoController::class, 'store'])
        ->name('documentos.store');
});

Route::middleware(['auth:sanctum', 'verified', 'CheckUserChefeConcurso'])->group(function () {
    Route::get('/candidato/inscricao/{inscricao_id}', [ConcursoController::class, 'inscricaoCandidato'])
        ->name('candidato.inscricao');

    Route::post('/aprovar-reprovar-candidato/inscricao/{inscricao_id}', [ConcursoController::class, 'aprovarReprovarCandidato'])
        ->name('aprovar-reprovar-candidato.inscricao');
});

Route::middleware(['auth:sanctum', 'verified', 'CheckUserPresidenteBanca'])->group(function () {

    Route::get('/candidatos/concurso/{concurso_id}', [ConcursoController::class, 'showCandidatosPresidenteBanca'])
        ->name('candidatos.concurso');

    Route::get('/avalia-documentos/inscricao/{inscricao_id}', [ConcursoController::class, 'avaliarDocumentosCandidato'])
        ->name('avalia.documentos.inscricao');

    Route::post('/avalia-documentos/inscricao/{inscricao_id}', [ConcursoController::class, 'savePontuacaoDocumentosCandidato'])
        ->name('avalia.documentos.inscricao');

    Route::get('/concurso/resultado/{concurso_id}', [ConcursoController::class, 'showResultadoFinal'])
        ->name('concurso.resultado');
});

Route::middleware(['auth:sanctum', 'verified', 'CheckUserIsNotCandadidato'])->group(function () {
    Route::get('/show-candidatos/concurso/{concurso_id}', [ConcursoController::class, 'showCandidatos'])
        ->name('show.candidatos.concurso');
});

Route::resource('concurso', ConcursoController::class);
Route::get('/visualizar-arquivo/{arquivo}/{cod}', [ArquivoController::class, 'show'])->name('visualizar.arquivo')->middleware('auth');
Route::get('/visualizar-ficha-avaliacao/{arquivo}', [ArquivoController::class, 'showFichAvaliacao'])
    ->name('visualizar.ficha-avaliacao')->middleware('auth');
