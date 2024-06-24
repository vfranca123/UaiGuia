<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\local;
use Illuminate\Http\Request;

class LocalController extends Controller
{
    public function locaisIndex(){
        $locais=local::orderBy('created_at', 'DESC');
        
        
        return view('local.locais',[
            'locais'=> $locais->paginate(5)
        ]);
    }
    public function adicionarlocalndex(){
        return view('local.Adicionalocais');
    }
    public function localStore(){
        $validated = request()->validate(
            [
                'nome_local' => 'required|min:3|max:26',
                'endereco' => 'required|min:8',
                'descricao' => 'required',
                'taxa_de_entrada' => 'required',
                'segmento'=>'required'
            ]
        );

        local::create([
            'nome_local' => $validated['nome_local'],
            'endereco' => $validated['endereco'],
            'descricao' => $validated['descricao'],
            'segmento' => $validated['segmento'],
            'taxa_de_entrada' => $validated['taxa_de_entrada']
        ]);
        
        return redirect()->route('locais.index')->with('flash','Local cadastrado com sucesso');
    }
}

