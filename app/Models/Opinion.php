<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opinion extends Model
{
    use HasFactory;

    public function benefits() 
    {
        return $this->hasMany(Benefit::class,'opinion_id');
    }
}
