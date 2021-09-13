@extends('layouts.admin')

@section('title', 'Configurações')

@section('content')

<h1>Configurações gerais Info</h1>
<br>

<!-- Condicionais dentro do blade/ funciona com isset - empty entre outras -->
@if($idade > 18)
    Eu sou maior de idade
@else
    Eu não sou maior idade 
@endif

<!-- Loops irão funcionar da mesma forma, como por exemplo @ for @ endfor, veja exemplos com forelse também -->
<br>
<a href="{{$config}}">Voltar</a>

@endsection