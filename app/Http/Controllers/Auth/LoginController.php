<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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

    #use AuthenticatesUsers;

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

    public function index(){
        echo "Estou aqui!<br>";
        #return view('auth.login');
    }

    public function authenticate(Request $request){
        //pegandos apenas os dois campos essenciais usando only
        $creds = $request->only(['email', 'password']);

        //fazendo a tentativa de login
        if(Auth::attempt($creds)){
            return redirect()->route('config');
        }else{
            return redirect()->route('home')->with('warning', 'Email e/ou senha invalidos');
        }
    }
}
