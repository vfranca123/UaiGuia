<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\evento;
use App\Models\FotoEvento ;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function EventoIndex(){
        $eventos=evento::orderBy('created_at', 'DESC');
        
        
        return view('evento.evento',[
            'eventos'=> $eventos->paginate(5)
        ]);
    }

    public function AdicionarEventolndex(){
        return view('evento.AdicionarEventoIndex');
    }
    public function EventoStore(Request $request){
        $validated = request()->validate(
            [
                'nome' => 'required|min:3|max:26',
                'local' => 'required|min:8',
                'descricao' => 'required',
                'taxa_de_entrada' => 'required',
                'data'=>'required'
            ]
        );
        $evento = new evento();
        $evento=evento::create([
            'nome' => $validated['nome'],
            'data' => $validated['data'],
            'descricao' => $validated['descricao'],
            'local' => $validated['local'],
            'taxa_de_entrada' => $validated['taxa_de_entrada']
        ]);

        
        if ($request->hasFile('img')) {
            // Armazenar a nova imagem
            $imagePath = request()->file('img')->store('FotosEventos', 'public');
            // Criar um novo registro de perfil de imagem
            
            FotoEvento ::create([
                'evento_id' => $evento->id,
                'img' => $imagePath
            ]);
        }
        return redirect()->route('evento.index')->with('flash','evento cadastrado com sucesso');
    }
}
