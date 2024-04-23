<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends AppModel
{
    use HasFactory;
    protected $fillable=['title','type','link','image'];
}
