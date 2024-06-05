<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vehicle extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'brand',
        'model',
        'plate',
        'year',
    ];
    protected $casts = [
        'year' => 'integer',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
        
}


