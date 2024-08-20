<?php

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\TarefaController;
use App\Http\Controllers\AreaServicoController;
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
    return view('welcome');
});

Route::controller(UsuarioController::class)->group(
    function () {
        Route::get('/usuario', 'index')->name('/usuario');
        Route::get('/usuario-create', 'create')->name("usuario.create");
        Route::post('/usuario-create', 'salvar')->name("usuario.create");
        Route::get('/usuario/{id}', 'view')->name('usuario.view');
        Route::get('/usuario/update/{usuario}', 'update')->name("usuario.update");
        Route::put('/usuario/update/{usuario}', 'atualizar')->name("usuario.update");
        Route::delete('/usuario/delete/{usuario}', 'destroy')->name('usuario.destroy');
        Route::post('/areaservico/{Areaservico}/employees', 'addFuncionarioToAreaServico')->name('areaservico.add-func');
        Route::delete('/areaservico/{Areaservico}/employees/{employee}', 'removeFuncionarioFromAreaServico')->name('areaservico.remove-func');


    }
);

Route::controller(TarefaController::class)->group(
    function () {
        //Listar Tarefas
        Route::get('/tarefa', 'index')->name('tarefa.index'); // Listagem de tarefas
        
        // Criar Tarefa
        Route::get('/tarefa/create', 'create')->name('tarefa.create');
        Route::post('/tarefa', 'store')->name("tarefa.store");
        
        // Editar Tarefa
        Route::get('/tarefa/{tarefa}/edit', 'edit')->name('tarefa.edit');
        Route::put('/tarefa/{tarefa}', 'update')->name("tarefa.update");
        
        // Visualizar Tarefa
        Route::get('/tarefa/{tarefa}', 'show')->name("tarefa.show"); 
        
        //Apagar Tarefa
        Route::delete('/tarefa/{tarefa}', 'destroy')->name("tarefa.destroy");
    }
);

Route::controller(AreaServicoController::class)->group(
    function (){
        Route::get('/areaservico', 'index')->name('areaservico.index'); // Listar áreas de serviço - FE-01
        Route::get('/areaservico/{id}', 'show')->name('areaservico.show'); // Mostrar uma area de servico especifica
        Route::get('/areaservico/create', 'create')->name('areaservico.create'); // Formulário de criação
        Route::post('/areaservico', 'store')->name('areaservico.store'); // Criar área de serviço - FA-01
        Route::get('/areaservico/{id}/edit','edit')->name('areaservico.edit'); // Formulário de edição - 
        Route::put('/areaservico/{id}', 'update')->name('areaservico.update'); // Atualizar área de serviço - FA 03
        Route::delete('/areaservico/{id}', 'destroy')->name('areaservico.destroy'); // Deletar uma area - FA-04


    }
);

    


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
