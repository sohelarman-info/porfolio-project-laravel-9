<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SendMail extends Model
{
    use HasFactory;
    use SoftDeletes;


    function User(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
