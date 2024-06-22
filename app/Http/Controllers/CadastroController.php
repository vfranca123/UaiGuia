<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CadastroController extends Controller
{
    public function cadastroIndex(){
        return view('cadastro.cadastro');
    }

    public function cadastroStore(){
        $validated = request()->validate(
            [
                'nome' => 'required|min:3|max:26',
                'fone' => 'required|min:8|max:14',
                'email' => 'required|email|unique:users,email',
                'senha' => 'required',
                'tipo_de_conta'=>'required'
            ]
        );

        User::create([
            'nome' => $validated['nome'],
            'fone' => $validated['fone'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['senha']),
            'tipo_de_conta' => $validated['tipo_de_conta']
        ]);
        
        return redirect()->route('login.index')->with('flash','Cadastro feito com sucesso');
    }
}
