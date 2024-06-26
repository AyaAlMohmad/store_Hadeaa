<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends AppModel
{
    use HasFactory;
    protected $fillable=['name'];
    public function sub_categories(){
        return $this->hasMany(SubCategory::class);
    }
}
