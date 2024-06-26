<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends AppModel
{
    use HasFactory;
    protected $fillable=['title','short_description','description','image'];
    // protected $table=['abouts'];
}
