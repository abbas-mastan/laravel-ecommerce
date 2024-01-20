<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Benefit extends Model
{
    use HasFactory;

    public function opinion()       
    {
        return $this->belongsTo(Opinion::class,'opinion_id');
    }
}
