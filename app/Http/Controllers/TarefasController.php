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

    public function edit($id){
        $data = DB::select('SELECT * FROM tarefas WHERE id = :id', [
            'id' => $id
        ]);
        if(count($data) > 0){
            return view('tarefas.edit', [
                'data' => $data[0]
            ]);
        }else{
            return redirect()->route('tarefas.list');
        }
        
    }

    public function editAction(Request $request, $id){
        if($request->filled('title')){
            $data = DB::select('SELECT * FROM tarefas WHERE id = :id', [
                'id' => $id
            ]);
            if(count($data) > 0){
                DB::update("UPDATE tarefas SET titulo = :titulo WHERE id = :id", [
                    'titulo' => $request->input('title'),
                    'id' => $id
                ]);
            }
            return redirect()->route('tarefas.list');
        }else{
            return redirect()->route('tarefas.edit', ['id' => $id])->with('warning', 'Você não preenchou o titulo!');
        }
    }

    public function del($id){
        DB::delete("DELETE FROM tarefas WHERE id = :id", [
            'id' => $id
        ]);

        return redirect()->route('tarefas.list');
    }

    public function done($id){

        DB::update('UPDATE tarefas SET resolvido = 1 - resolvido WHERE id = :id', ['id' => $id]);

        return redirect()->route('tarefas.list');
    }
}
