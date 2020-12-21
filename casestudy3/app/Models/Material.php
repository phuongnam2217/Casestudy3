<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;
    protected $table = 'materials';

    public $timestamps = false;

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
