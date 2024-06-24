<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class local extends Model
{
    protected $fillable = [
        'nome_local',
        'endereco',
        'descricao',
        'segmento',
        'taxa_de_entrada',
    ];
    use HasFactory;

    public function links($local){
        return view('local.localCard',['local'=>$local]);
    } 
}
