@extends('layouts.admin')

@section('title', 'Listagem de tarefas')

@section('content')

<h2>Listagem</h2>

<a href="{{route('tarefas.add')}}">Adicionar nova tarefa</a>

@forelse($list as $item)
    <ul>
        <li>
            <a href="{{route('tarefas.done', ['id' => $item->id])}}">[@if($item->resolvido == 1) Desmarcar @else Marcar @endif]</a>
            {{$item->titulo}} 
            <a href="{{route('tarefas.edit', ['id' => $item->id])}}">[Editar]</a> - 
            <a href="{{route('tarefas.del', ['id' => $item->id])}}">[Excluir]</a>
        
        </li>
    </ul>
    
@empty
    Não há itens a serem mostrados
@endforelse

@endsection