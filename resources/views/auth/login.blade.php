@extends('layouts.admin')

@section('title', 'Login')

@section('content') 

@if(session('warning'))
<x-alert>{{session('warning')}}</x-alert>
@endif
Não tem uma conta? <a href="{{route('register')}}">Cadastre-se</a>
<br>
<form method="POST" action="{{route("authlogin")}}">
    @csrf 

    Email: <br>
    <input type="email" name="email"><br>
    Senha: <br>
    <input type="password" name="password"><br>
    @if($tries <= 3)
        <input type="submit" Value="Entrar">
    @else
        Você foi bloqueado
    @endif
</form>
<br>
Tentativas: {{$tries}}
@endsection
