<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plating extends Model
{
    use HasFactory;
    protected $table = 'plating';
    public $timestamps = false;

    function products()
    {
        return $this->hasMany(Product::class);
    }
}
