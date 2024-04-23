<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdditionColor extends Model
{
    use HasFactory;
      // protected $fillable = ['color_id','addition_id'];
      protected $guarded = [];
      public function color()
     {
         return $this->belongsTo(Color::class);
     }
  
     public function addition()
     {
         return $this->belongsTo(Addition::class);
     }
}
