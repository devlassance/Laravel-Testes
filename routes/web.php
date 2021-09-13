<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ConfigController;
use App\Http\Controllers\HomeController;

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


