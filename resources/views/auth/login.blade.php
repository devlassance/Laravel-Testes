@extends('layouts.admin')

@section('title', 'Login')

@section('content')

<form method="POST">
    @csrf 

    Email: <br>
    <input type="email" name="email"><br>
    Senha: <br>
    <input type="password" name="password"><br>
    <input type="submit" Value="Entrar">
</form>

@endsection