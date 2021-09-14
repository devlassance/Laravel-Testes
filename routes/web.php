<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ConfigController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TarefasController;

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

//Usando controller para gerenciamento de rotas
Route::get('/',  HomeController::class);

//Rotas de redirecionamento
#Route::redirect('/', 'teste');

//formas mais direta de informar uma rota quando a mesma é uma view fixa
Route::view('/teste', 'teste');

Route::get('/noticia/{id}', function($slug) {
    echo "Titulo: ".$slug;
});

Route::get('/user/{name}', function($name){
    echo "Mostrando usuário de nome: ".$name;
})->where('name', '[a-z]+'); //Usando Regex nas rotas


Route::get('/user/{id}', function($id){
    echo "Mostrando usuário de ID: ".$id;
})->where('id', '[0-9]+'); //Usando Regex nas rotas

//Definindo grupo de rotas Tarefas
Route::prefix('/tarefas')->group(function(){

    Route::get('/', [TarefasController::class, 'list']);

    Route::get('add', [TarefasController::class, 'add']); //Tela de adição
    Route::post('add', [TarefasController::class, 'addAction']); //Ação de adição

    Route::get('edit/{id}', [TarefasController::class, 'edit']); //Tela de edição
    Route::post('edit/{id}', [TarefasController::class, 'editAction']); //Ação de edição

    Route::get('delete/{id}', [TarefasController::class, 'del']); //Ação de deletar

    Route::get('marcar/{id}', [TarefasController::class, 'done']); //Marcar resolvido/não resolvido
});

//Definindo um grupo de rotas
Route::prefix('/config')->group(function(){

    //Usando controller para ter melhor gerenciamento de rotas

    Route::get('/',  [ConfigController::class, 'index'])->name('config');

    Route::get('info', [ConfigController::class, 'permissoes'])->name("permissoes");//Definindo nomes para as rotas

    Route::get('permissoes', [ConfigController::class, 'info'])->name('info'); //Definindo nomes para as rotas


    //definindo rotas de requisição post e rotas de requisição get
    Route::get('form', [ConfigController::class, 'form'])->name('form');
    Route::post('form', [ConfigController::class, 'form'])->name('form');

});

//quando nenhuma rota bater, o fallback será chamado
Route::fallback(function(){
    return view('404');
});


