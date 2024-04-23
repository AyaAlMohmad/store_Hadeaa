<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends AppModel
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'price', 'sub_category_id', 'image_first'];
    public function sub_category()
    {
        return $this->belongsTo(SubCategory::class);
    }
    public function images()
    {
        return $this->hasMany(ImageProduct::class);
    }
    public function colors()
    {
        return $this->belongsToMany(Color::class, 'color_products');
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'orders');
    }
    public function usersFavorite()
    {
        return $this->belongsToMany(User::class, 'favorites');
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
