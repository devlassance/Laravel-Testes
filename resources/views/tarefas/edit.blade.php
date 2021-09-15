@extends('layouts.admin')

@section('title', 'Editar tarefa')

@section('content')
<h2>Editar Tarefa ({{$data->titulo}})</h2>

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
    <input type="text" name="title" value="{{$data->titulo}}"><br>
    <input type="submit" value="Editar">
</form>

<hr>

<a href="{{route('tarefas.list')}}"> Voltar < </a>
@endsection