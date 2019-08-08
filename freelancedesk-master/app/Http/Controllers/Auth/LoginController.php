<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = '/home';
    
    public function showLoginForm(){
        return view('auth.login');
    }
    
    //funciṕn que retorna la vista al menú principal con el tipo de usuario
    /*public function login(Request $request){

        
        return view ('principal')
                                  ->with('tipo', $request->input('tipo')); 
    }   */
  
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        unset($_COOKIE['user_type']);
    }
}
