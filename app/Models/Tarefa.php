<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tarefa;

class Tarefa extends Model
{
    use HasFactory;
    //Informações que o laravel interpreta dentro do banco de dados como padrão 
    #protected $table = 'tarefas'; Caso a table tenha o nome diferente do plural do model, atualizar aqui
    #protected $primary_key = 'id';
    #public $incrementing = true;
    #protected $keyType = 'integer';

    //mudar por padrão campos que o laravel interpreta que está presente na tebel
    #const CREATED_AT = 'criado_em'
    #const UPDATED_AT = 'atualizado_em'

    //desativar a interpretação do laravel sobre esses campos
    public $timestamps = false;

    //permitindo alterações em massa do campo titulo em códigos mais compactos
    protected $fillable = ['titulo'];

    
}
