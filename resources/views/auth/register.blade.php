@extends('layouts.admin')

@section('title', 'Registro')

@section('content') 

@if($errors->any())
<x-alert>
@foreach($errors->all() as $error)
    {{$error}} <br>
@endforeach    
</x-alert>
@endif

<form method="POST" action="{{route("authregister")}}">
    @csrf 
    Nome: <br>
    <input type="text" name="name" value="{{old('name')}}"><br>
    Email: <br>
    <input type="email" name="email" value="{{old('email')}}"><br>
    Senha: <br>
    <input type="password" name="password"><br>
    Confirma sua senha: <br>
    <input type="password" name="password_confirmation"><br>
    <input type="submit" Value="Cadastrar">
</form>

@endsection
