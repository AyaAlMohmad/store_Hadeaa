<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends AppModel
{
    use HasFactory;
    protected $fillable=['name','image','category_id'];
    public function products(){
        return $this->hasMany(Product::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function latest_product()
    {
        return $this->hasOne(Product::class)->latestOfMany();
    }
}
