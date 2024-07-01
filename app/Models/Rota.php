<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rota extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'quantidade_destinos'
    ];
    
    public function locais(){
        return $this->belongsToMany(Local::class);
    }
    
}
