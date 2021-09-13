@extends('layouts.admin')

@section('title', 'Configurações')

@section('content')

<h1>Formulário</h1>
<br>

<form method="POST">
<!-- csrf um barramento de segurança padrão do laravel -->
    @csrf

    Nome: <br>
    <input type="text" name="nome" /></br>
    Idade </br>
    <input type="text" name="idade"></br>
    Estado </br>
    <input type="text" name="estado"><br><br>


    <input type="submit">
</form>
<br>
<a href="{{$config}}">Voltar</a>

@endsection