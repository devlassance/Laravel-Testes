<!-- Puxando os valores setados no template dentro da view -->

@extends('layouts.admin')

@section('title', 'Configurações')

@section('content')

    <h1>Configurações gerais</h1>
    <h3>Versão: {{$version}}</h3>
    <h2>Área Restrita</h2>

    <ul style="text-decoration:none">
        <li><a href="{{$link1}}">Permissoes</a> </li>
        <li><a href="{{$link2}}">Info</a></li>
        <li><a href="{{$link3}}">Formulário</a></li>
    </ul>
    <br>
    <a href="{{route('logout')}}">Sair</a>
@endsection