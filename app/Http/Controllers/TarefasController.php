<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Puxando banco de dados
use Illuminate\Support\Facades\DB;

class TarefasController extends Controller
{
    public function list(){



        $list = DB::select("SELECT * FROM tarefas");
        
        $data = [
            'list' => $list
        ];

        return view('tarefas.list', $data);
    }

    public function add(){
        return view('tarefas.add');
    }

    public function addAction(Request $request){

        if($request->filled('title')){
            $title = $request->input('title');

            DB::insert("INSERT INTO tarefas (titulo) VALUES (:title)", ['title' => $title]);

            return redirect()->route('tarefas.list');
        }else{
            //Criando uma mensagem flash, que pode ser puxada na página usando o parametro session()
            //Diferente do $_SESSION, depois que essa mensagem é lida, ela some da sessão
            return redirect()->route('tarefas.add')->with('warning', 'Você não preenchou o titulo!');
        }
        
    }

    public function edit(){
        return view('tarefas.edit');
    }

    public function editAction(){
        
    }

    public function del(){
        
    }

    public function done(){

    }
}
