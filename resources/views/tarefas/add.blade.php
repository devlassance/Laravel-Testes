@extends('layouts.admin')

@section('title', 'Adicionar Tarefa')

@section('content')
<h2>Adicionar Tarefa</h2>

@if($errors->any())
<x-alert>
    @foreach($errors->all() as $error) 
        {{$error}} <br>
    @endforeach
</x-alert>
<br>
@endif

<form method="POST">
    @csrf

    Titulo: <br>    
    <input type="text" name="title"><br>
    <input type="submit" value="Adicionar">
</form>

<hr>

<a href="{{route('tarefas.list')}}"> Voltar < </a>
@endsection