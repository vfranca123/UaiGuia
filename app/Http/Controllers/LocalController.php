<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\local;
use App\Models\FotoLocal;
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
    public function localStore(Request $request){
        $validated = request()->validate(
            [
                'nome_local' => 'required|min:3|max:26',
                'endereco' => 'required|min:1',
                'descricao' => 'required',
                'taxa_de_entrada' => 'required',
                'segmento'=>'required'
            ]
        );
        $local = new local();
        $local=local::create([
            'nome_local' => $validated['nome_local'],
            'endereco' => $validated['endereco'],
            'descricao' => $validated['descricao'],
            'segmento' => $validated['segmento'],
            'taxa_de_entrada' => $validated['taxa_de_entrada']
        ]);

        
        if ($request->hasFile('img')) {
            // Armazenar a nova imagem
            $imagePath = request()->file('img')->store('FotosLocais', 'public');
            // Criar um novo registro de perfil de imagem
            
            FotoLocal::create([
                'local_id' => $local->id,
                'img' => $imagePath
            ]);
        }
        
        
        return redirect()->route('locais.index')->with('flash','Local cadastrado com sucesso');
    }
}

