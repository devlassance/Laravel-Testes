<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{   
    //Invoke funciona como o próprio index, quando o controller não tem nenhuma action definida
    public function __invoke() {
        return view('welcome');
    }
}
