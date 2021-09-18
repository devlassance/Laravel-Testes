@extends('layouts.admin')

@section('title', 'Home')

@section('content')
<h2>Projetos no momento</h2>

<ul>
    <a href="{{route('tarefas.list')}}"><li>Tarefas</li></a>
    <a href="{{route('login')}}"><li>Autenticações</li></a>
</ul>

@endsection