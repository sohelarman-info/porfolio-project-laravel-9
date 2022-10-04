<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PortfolioProject extends Model
{
    use HasFactory;
    use SoftDeletes;
    function MultipleImages(){
        return $this->hasMany(MultipleImage::class, 'project_id');
    }
    function Category(){
        return $this->belongsTo(PortfolioCategory::class, 'category');
    }
    function User(){
        return $this->belongsTo(User::class, 'auth_id');
    }
}
