<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;

    function Blog(){
        return $this->hasMany(Blog::class, 'category_id');
    }
    function User(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
