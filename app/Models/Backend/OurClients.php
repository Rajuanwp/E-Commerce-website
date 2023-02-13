<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurClients extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
       'description',
       'logo',
       'status',
    ];
}
