<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoLocal extends Model
{
    use HasFactory;
    protected $fillable=[
        'local_id',
        'img'
    ];
}
