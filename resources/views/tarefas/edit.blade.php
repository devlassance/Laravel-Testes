@extends('layouts.admin')

@section('title', 'Editar tarefa')

@section('content')
<h2>Editar Tarefa ({{$data->titulo}})</h2>

@if(session('warning'))
    <x-alert>{{session('warning')}}</x-alert>
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