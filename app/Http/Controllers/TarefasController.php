<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TarefasController extends Controller
{
    public function list(){
        return view('tarefas.list');
    }

    public function add(){
        return view('tarefas.add');
    }

    public function addAction(){
        
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
