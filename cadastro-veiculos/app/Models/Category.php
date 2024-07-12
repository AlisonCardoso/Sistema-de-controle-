<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [ 'name','description','is_active' ];


    public function product()
    {

        return $this->hasMany(Product::class);
    }
    public function service()
    {

        return $this->hasMany(Service::class);
    }
}
