<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class local extends Model
{
    protected $fillable = [
        'nome_local',
        'endereco',
     

    ];
    use HasFactory;

    public function links($local){
        return view('local.localCard',['local'=>$local]);
    }

    public function links_escolha($local){
        return view('local.localEscolha',['local'=>$local]);
    }
    
    public function Foto(){
        return $this->hasOne(FotoLocal::class,'local_id','id');       
    } 

    public function getImageURL(){
        if($this->Foto){
            return asset("storage/{$this->Foto->img}");
        } return null;
    }

    public function rotas($local){
        return $this->belongsToMany(Rota::class, 'destino_rotas', 'local_id', 'rota_id');
    }
}
