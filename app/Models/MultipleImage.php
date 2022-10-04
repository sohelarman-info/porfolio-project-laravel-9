<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MultipleImage extends Model
{
    use HasFactory;
    use SoftDeletes;
    function PortfolioProject(){
        return $this->belongsTo(PortfolioProject::class, 'project_id');
    }
}
