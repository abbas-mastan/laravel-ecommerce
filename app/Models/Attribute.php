<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    public function variations() 
    {
        return $this->hasMany(Variation::class,'attribute_id');
    }
}
