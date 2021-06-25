<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConcursoController;
use App\Http\Controllers\InscricaoController;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
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
    Route::get('/inscricao-concurso/{id}', [InscricaoController::class, 'inscreverseConcurso'])
        ->name('inscricao.concurso');

    Route::post('/save-inscricao', [InscricaoController::class, 'saveInscricao'])
        ->name('save.inscricao');

    Route::get('/show-inscricoes', [InscricaoController::class, 'showInscricoes'])
        ->name('show.inscricoes');

    Route::get('/show-inscricao', [InscricaoController::class, 'showInscricao'])
        ->name('show.inscricao');
});

Route::resource('concurso', ConcursoController::class);
