<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vehicle extends Model
{
    use HasFactory;


    protected $fillable = [
        
        'brand', // marca
        'model', //modelo
        'plate', //placa
        'prefix', //prefix
        'year', //ano
        'characterized', //caracterizada
        'active',// ativa,
        'price' ,//preco
        'type', //tipo 
        'user_id', 

        /*  */
    ];
    protected $casts = [
        'year' => 'integer',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
        
}


