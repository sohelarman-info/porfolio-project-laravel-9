<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PortfolioCategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    function Project(){
        return $this->hasMany(PortfolioProject::class, 'category');
    }
}
