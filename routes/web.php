<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConcursoController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified', 'CheckUserAdmin'])->group(function () {
    Route::get('/create-usuario', [AdminController::class, 'createUsuario'])
        ->name('create.usuario');

    Route::post('/save-usuario', [AdminController::class, 'saveUsuario'])
        ->name('save.usuario');

    Route::get('/show-usuarios', [AdminController::class, 'showUsuario'])
        ->name('show.usuarios');

    Route::get('/edit-usuario', [AdminController::class, 'editUsuario'])
        ->name('edit.usuario');

    Route::post('/save-edit-usuario', [AdminController::class, 'saveEditUsuario'])
        ->name('save.edit.usuario');

    Route::get('/delete-usuario/{id}', [AdminController::class, 'deleteUsuario'])
        ->name('delete.usuario');
});

Route::resource('concurso', ConcursoController::class)->middleware(['auth:sanctum', 'verified']);
