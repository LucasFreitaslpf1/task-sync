<?php

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\TarefaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::controller(UsuarioController::class)->group(
    function () {
        Route::get('/usuario', 'index')->name('/usuario');
        Route::get('/usuario-create', 'create')->name("usuario.create");
        Route::post('/usuario-create', 'salvar')->name("usuario.create");
        Route::get('/usuario/{id}', 'view')->name('usuario.view');
        Route::get('/usuario/update/{usuario}', 'update')->name("usuario.update");
        Route::put('/usuario/update/{usuario}', 'atualizar')->name("usuario.update");
        Route::delete('/usuario/delete/{usuario}', 'delete')->name('usuario.destroy');
    }
);

Route::controller(TarefaController::class)->group(
    function () {
        Route::get('/tarefa', 'index')->name('/tarefa');
        Route::get('/tarefa/create', 'create')->name('tarefa.create');
        Route::post('/tarefa', 'store')->name("tarefa.store");
        Route::get('/tarefa/{tarefa}', 'show')->name("tarefa.show");
        Route::delete('/tarefa/{tarefa}', 'destroy')->name("tarefa.destroy");
    }
);
