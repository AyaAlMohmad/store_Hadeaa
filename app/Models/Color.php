<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends AppModel
{
    use HasFactory;
    protected $fillable=['title','color_code','image'];
    public function products()
    {
        return $this->belongsToMany(Product::class,'color_products');
    }
    public function additions()
    {
        return $this->belongsToMany(Addition::class,'addition_colors');
    }
}
