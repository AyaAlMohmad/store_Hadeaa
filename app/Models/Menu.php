<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends AppModel
{
    use HasFactory;
    protected $fillable=['name','title','description','short_description','image'];
}
