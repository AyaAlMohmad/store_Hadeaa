<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addition extends AppModel
{
    use HasFactory;
    protected $fillable=['title','description','image'];
    public function images()
    {
        return $this->hasMany(AdditionImage::class);
    }
    public function colors()
    {
        return $this->belongsToMany(Color::class, 'addition_colors');
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'order_additions');
    }
}