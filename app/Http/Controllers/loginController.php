<?php

namespace App\Http\Controllers;

use App\Login;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Return_;
use App\usuarios;
use GuzzleHttp\Middleware;

class loginController extends Controller
{
         
    public function store(Request $request){
        $request->validate([
            'username'=>'required|exists:usuarios',
            'password' => 'required'
            ]);
      
session()->invalidate();
session()->regenerateToken();

        $credenciales = request()->only('username','password');


        if (Auth::attempt($credenciales)) {
        $request->session()->regenerate();
        return redirect()->route('home')->with('entrar','si');  
        }else{
            return redirect('/')->with('entrar','no'); 
             
        }

}

public function logout(Request $request){
Auth::logout();
$request->session()->invalidate();
$request->session()->regenerateToken();
return redirect('/');

}

}
