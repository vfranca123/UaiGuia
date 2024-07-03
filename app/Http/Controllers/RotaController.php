<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rota;
use App\Models\Local;
use Illuminate\Support\Facades\Http;

class RotaController extends Controller
{
    public function RotasIndex()
    {
        $user = auth()->user();
        $rotas = $user->rotas;
        return view('rotas.rotas', compact('rotas'));
    }

    public function AdicionarLocaisStore(Request $request)
    {
        // Pega o nome da rota do formulário
        $nomeRota = $request->input('nome');

        // Pega o usuário autenticado
        $user = auth()->user();

        // Cria uma nova instância de Rota e define os atributos
        $rota = new Rota();
        $rota->nome = $nomeRota;
        $rota->quantidade_destinos = 0;
        $rota->user_id = $user->id;
        $rota->save();

        // Pega os IDs dos locais selecionados do formulário
        $localIds = $request->input('locais_id', []);

        // Incrementa a quantidade de destinos e associa os locais à rota
        foreach ($localIds as $localId) {
            $local = Local::find($localId);

            if ($local) {
                $rota->locais()->attach($localId);
                $rota->quantidade_destinos++;
            }
        }

        // Salva a quantidade de destinos
        $rota->save();

        // Redireciona para a rota 'rotas.index' com uma mensagem de sucesso
        return redirect()->route('rotas.index')->with('flash', 'Rota cadastrada com sucesso');
    }

    public function AdicionarRotasIndex()
    {
        $locais = Local::orderBy('created_at', 'DESC')->paginate(5);

        return view('rotas.AdicionaRota', [
            'locais' => $locais
        ]);
    }
    public function map(Rota $rota)
    {
        $locais = $rota->locais()->get();

        return view('rotas.map', [
            'rota' => $rota,
            'locais' => $locais,
        ]);
        
    }
}
