<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rota;

class RotaController extends Controller
{
    public function RotasIndex(){
        return view('rotas.rotas');
    }

    public function adicionarLocais(Request $request, $rotaId)
    {
        $rota = Rota::find($rotaId);
        $localIds = $request->input('local_ids'); // IDs dos locais fornecidos na requisição

        // Associar os locais à rota
        $rota->locais()->attach($localIds);
        $rota->quantidade_destinos++;
        return view('rotas.blade');
    }
}
