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

/*Route::get('/', function () {
    return view('welcome');
});*/

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

Route::get('/', [ConcursoController::class, 'showConcursos'])
    ->name('/');

Route::get('/info-concurso', [ConcursoController::class, 'infoConcurso'])
    ->name('info.concurso');

Route::resource('concurso', ConcursoController::class)
    ->middleware(['auth:sanctum', 'verified', 'CheckUserChefeConcurso']);
