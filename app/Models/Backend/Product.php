<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable=[
        'brand_id',
        'category_id',
        'product_name',
        'product_slug',
        'product_code',
        'product_qty',
        'product_tags',
        'product_size',
        'product_color',
        'selling_price',
        'discount_price',
        'long_descp',
        'product_thambnail',
        'vendor_id',
        'hot_deals',
        'featured',
        'special_offer',
        'special_deals',
        'status'
    ];


    public function category(){
        return $this->belongsTO(Category::class,'category_id','id');
    }
    public function brand(){
        return $this->belongsTO(Brand::class,'brand_id','id');
    }

    public function multiImg(){
        return $this->belongsTO(MultiImg::class,'product_id','id');
    }

}
