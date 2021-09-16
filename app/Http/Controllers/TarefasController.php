<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Puxando banco de dados
use Illuminate\Support\Facades\DB;

use App\Models\Tarefa;

class TarefasController extends Controller
{
    public function list(){
        $list = Tarefa::all();
        
        $data = [
            'list' => $list
        ];

        return view('tarefas.list', $data);
    }

    public function add(){
        return view('tarefas.add');
    }

    public function addAction(Request $request){

            //buscar dados de validação na documentação do laravel
            $request->validate([
                'title' => ['required', 'string']
            ]);

            $title = $request->input('title');
            $t = new Tarefa;
            $t->titulo = $title;
            $t->save();

            return redirect()->route('tarefas.list');
        
    }

    public function edit($id){

        $item = Tarefa::find($id);
        if($item){
            return view('tarefas.edit', [
                'data' => $item
            ]);
        }else{
            return redirect()->route('tarefas.list');
        }
        
    }

    public function editAction(Request $request, $id){

        //buscar dados de validação na documentação do laravel
            $request->validate([
                'title' => ['required', 'string']
            ]);

            Tarefa::find($id)->update(['titulo' => $request->input('title')]);

            return redirect()->route('tarefas.list');
    }

    public function del($id){

        Tarefa::find($id)->delete();
        return redirect()->route('tarefas.list');
    }

    public function done($id){

        $t = Tarefa::find($id);
        if($t){
            $t->resolvido = 1 - $t->resolvido;
            $t->save();
        }
        return redirect()->route('tarefas.list');
    }
}
