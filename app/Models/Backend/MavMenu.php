<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MavMenu extends Model
{
    use HasFactory;
    protected $fillable=[
             'name',
            'parent_id',
            'status'
    ];

    public function children()
    {
        return $this->hasMany(MavMenu::class, 'parent_id');
    }

public function subcategories()
{
    return $this->belongsTo(MavMenu::class,'parent_id');
}

}
