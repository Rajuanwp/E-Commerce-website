<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variation extends Model
{
    use HasFactory;

    public function variations()
    {
        return $this->hasMany(Variation::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
