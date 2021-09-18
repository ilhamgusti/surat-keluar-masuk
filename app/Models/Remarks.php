<?php

namespace App\Models;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Remarks extends Model
{
    public function remarkable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
