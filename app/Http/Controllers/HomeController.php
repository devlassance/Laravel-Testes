<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarefa;

class HomeController extends Controller
{   
    /*
    //Invoke funciona como o próprio index, quando o controller não tem nenhuma action definida
    public function __invoke() {
        return view('welcome');
    }
    */

    public function index(){

        //dessa forma você está rodando a query no total 
        //você também pode fazer multiplos where, dessa forma where('conditions')->where('second conditions')
        //ou usar o orWhere para trazer resultados || 
        #$list = Tarefa::where('resolvido', 0)->get();

        //Dessa forma você está pegando o primeiro resultado
        #$list = Tarefa::where('resolvido', 0)->first();

        //Dessa forma você retorna quantos resultados vieram
        #$list = Tarefa::where('resolvido', 0)->count();


        //Dessa forma estou buscando um item cujo o ID é 2
        //Você também pode montar um array, dessa forma [2,3,4], dentro de find
        #$item = Tarefa::find(2);


        //Adicionando um novo item
        /*
        $t = new Tarefa;
        $t->titulo = 'Teste322';
        $t->save();
        */

        //Editando um item
        /*
        $t = Tarefa::find(3);
        $t->titulo = 'Editado';
        $t->save();
        */

        //Deletando um item
        /*
        $t = Tarefa::find(3);
        $t->delete();
        */

        //Editando em massa
        
        /*
        Tarefa::where('resolvido', 1)->update([
            'resolvido' => 0
        ]);
        */

        #return view('index');
    }
}
