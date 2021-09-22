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

<!--Puxando uma mensagem da pastas de linguanges do laravel -->
@lang('messages.teste')
<br>
<!--Puxando a mensagem e definindo o parametro -->
@lang('messages.tryerror', ['x' => 3])

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
