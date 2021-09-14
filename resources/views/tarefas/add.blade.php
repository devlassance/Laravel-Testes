@extends('layouts.admin')

@section('title', 'Adicionar Tarefa')

@section('content')
<h2>Adicionar Tarefa</h2>

@if(session('warning'))
    <x-alert>{{session('warning')}}</x-alert>
    <br>
@endif

<form method="POST">
    @csrf

    Titulo: <br>    
    <input type="text" name="title"><br>
    <input type="submit" value="Adicionar">
</form>
@endsection