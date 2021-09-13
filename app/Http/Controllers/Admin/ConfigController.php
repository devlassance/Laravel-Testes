<?php
//Atualizando o namespace para a pasta correta onde se está o configcontroller
namespace App\Http\Controllers\Admin;

//Puxando o arquivo controller
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConfigController extends Controller
{

    public function index(Request $request){

        //Setando variaveis com rotas nomeadas
        $link1 = route("permissoes");
        $link2 = route('info');
        $link3 = route('form');

        $data = [
            'link1' => $link1,
            'link2' => $link2,
            'link3' => $link3
        ];

        return view('admin.config', $data);
    }

    public function info(){
        $link3 = route('config');
        $data = [
            'config' => $link3
        ];

        return view('admin.info', $data);
    }

    public function permissoes(){

        $link3 = route('config');
        $data = [
            'config' => $link3
        ];

        return view('admin.permissoes', $data);
    }

    public function Form(Request $request){


        //buscar documentação tipos de request laravel

        //Exemplos de requisição de dados
        
        /*
        $data = $request->all();

        echo "Meu nome é: ".$data['nome']." e minha idade é: ".$data['idade'];
        */

        $link = route('config');
        $data = [
            'config' => $link
        ];


        //verificar se o campo existe e se não está vazio missing para caso esteja faltando o dado "estado"
        if($request->filled('estado')){
            echo "tem estado <br>";
        }else{
            echo "não tem estado <br>";
        }

        //Buscando o dado do input e definindo um dado padrão como 'visitante' 
        $nome = $request->input('nome', 'Visitante');

        echo "meu nome é ".$nome."<br>";

        //se o form estivesse dentro de uma pasta dentro da view, eu puxaria ele da seguinte form (pasta.form)
        return view('admin.form', $data);
    }
    
}
