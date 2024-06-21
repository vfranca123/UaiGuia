<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function loginIndex(){
        return view('login.login');
    }
    
    public function authenticate()
    {
        
        $validet = request()->validate([

            'email' => 'required|email',
            'password' => 'required'

        ]);

        if (auth()->attempt($validet)) {

            request()->session()->regenerate();
            
            return redirect()->route('locais.index')->with('flash','login feito com sucesso');
        }

        return redirect()->route('login.index');
    }

    public function logout()
    {
        request()->session()->invalidate();
        auth()->logout(); // pega os dados do cara logado e e faz um logOut
        request()->session()->invalidate(); // invalida os dados anteriores pra segurança
        request()->session()->regenerate(); // limpa a cache

        return redirect()->route('index')->with('flash','logout feito com sucesso');
    }
}
