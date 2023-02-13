<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'parent_id',
        'name',
        'image',
        'status',
    ];

// এই ফাংশন children() এর মানে হচ্ছে একটি Category model থেকে একটি parent_id ফিল্ডের মাধ্যমে একাধিক child Category model এর সংযোগ নির্ধারণ। এটি hasMany relationship এর একটি উদাহরণ।
// এই children() ফাংশনটিতে প্রস্তুতকারক Laravel এর Eloquent ORM দ্বারা একটি hasMany রেলেশনশিপ তৈরি করছে। এটি Category মডেলের সাথে parent_id এর মাধ্যমে অন্য Category মডেলের একটি সমূহের সাথে সম্পর্ক করছে। ত্যারা এই children() মেথডকে ব্যবহার করে প্যারেন্ট ক্যাটেগরীর সাথে সংযুক্ত সমস্ত সন্তান ক্যাটেগরি তালিকা তৈরি করতে পারে।
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

public function subcategories()
{
    return $this->belongsTo(Category::class,'parent_id');
}

}




