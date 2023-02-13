<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardSection extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable=[
        'title',
        'description',
        'icon',
        'status',
    ];
}
