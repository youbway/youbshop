<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable =[
        'section_id',
        'category_id' ,
        'brand_id' ,
        'vendor_id' ,
        'admin_type' ,
        'name'  ,
        'code' ,
        'color' ,
        'price' ,
        'discount' ,
        'weight' ,
        'image' ,
        'video' ,
        'meta_title' ,
        'meta_description' ,
        'meta_keywords' ,
        'is_featured' ,
        'status' ,
    ];
}