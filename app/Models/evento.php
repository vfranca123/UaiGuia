<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class evento extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'data',
        'descricao',
        'local',
        'segmento',
        'taxa_de_entrada',
    ];

    public function Foto(){
        return $this->hasOne(FotoEvento::class,'evento_id','id');       
    }

    public function getImageURL(){
        if($this->Foto()){
            return asset("storage/{$this->Foto->img}");
        } return null;
    }

    public function links($evento){
        return view('evento.eventoCard',['evento'=>$evento]);
    }
}
