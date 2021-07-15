<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{   
    protected $table = 'Posts';
    
    protected $fillable = [
        'name', 'Description'//,'image'
    ];
}
