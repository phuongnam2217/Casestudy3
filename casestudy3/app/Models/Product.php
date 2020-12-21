<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'category_id',
        'price',
        'view',
        'sold',
        'stock',
        'status',
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
    public function material()
    {
        return $this->belongsTo(Material::class);
    }
    public function plating()
    {
        return $this->belongsTo(Plating::class);
    }
}
