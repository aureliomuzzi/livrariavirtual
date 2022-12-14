<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AutoresController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\ApiController;

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

Auth::routes();

Route::middleware('auth')->group(function() {
    Route::get('/', function () {
        return redirect('/livros');
    });

    Route::resource('users', UserController::class)->except(['destroy']);
    Route::get('/users/{id}/destroy', [UserController::class, 'destroy'])->name('users.destroy');

    Route::resource('autor', AutoresController::class)->except(['destroy']);
    Route::get('/autor/{id}/destroy', [AutoresController::class, 'destroy'])->name('autor.destroy');

    Route::resource('livros', LivroController::class)->except(['destroy']);
    Route::get('/livros/{id}/destroy', [LivroController::class, 'destroy'])->name('livros.destroy');

    Route::get('/api-icct', ApiController::class);
});
