<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    /* Para puxar linguagens dentro do controller você usa __(nomedoarquivo.nomedamensagem)*/ 

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */


    protected $redirectTo = RouteServiceProvider::CONFIG;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm(Request $request){
        //Definindo o nome da sessão (login_tries), e o valor padrão
        $tries = $request->session()->get('login_tries', 0); 

        $data = ['tries' => $tries];

        return view("auth.login", $data);
    }   

    public function authenticate(Request $request){
        //pegandos apenas os dois campos essenciais usando only
        $creds = $request->only(['email', 'password']);

        $tries = $request->session()->get('login_tries', 0);
        if($tries <=3){
            //fazendo a tentativa de login
            if(Auth::attempt($creds)){
                //adicionando um valor a session login_tries
                $request->session()->put('login_tries', 0);
                return redirect()->route('config');
            }else{
                //adicionando um valor a session login_tries
                $request->session()->put('login_tries', ++$tries);

                return redirect()->route('login')->with('warning', 'Email e/ou senha invalidos');
            }
        }
        
        
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
