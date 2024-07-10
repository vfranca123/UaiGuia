<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\local;
use App\Models\FotoLocal;
use Illuminate\Http\Request;


class LocalController extends Controller
{
    public function locaisIndex() {
        $locais = Local::orderBy('created_at', 'DESC')->get();
        
        return view('local.locais', [
            'locais' => $locais
        ]);
    }
    public function adicionarlocalndex(){
        return view('local.Adicionalocais');
    }
    public function localStore(Request $request){
        $validated = request()->validate(
            [
                'endereco' => 'required|min:1|unique:locals,endereco',
                'descricao',
                'taxa_de_entrada',
                'segmento'
            ]
        );
        $local = new local();
        $local=local::create([
            'nome_local' => $validated['endereco'],
            'endereco' => $validated['endereco'],
           
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

