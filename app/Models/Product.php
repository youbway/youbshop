<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class Product extends Model
{
    use HasFactory;

    protected $fillable =[
        'section_id',
        'category_id' ,
        'brand_id' ,
        'vendor_id' ,
        'admin_id' ,
        'admin_type' ,
        'name'  ,
        'description',
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

    // ================= validation ==================




    // ================= attributes ==================
    public function changePublicToStorage()
    {
        return str_replace('public','storage', $this->attributes['video']);
    }

    public function changeStorageToPublic()
    {
        return str_replace('publicstorage','', $this->attributes['video']);
    }


    // ================= relations ==================
    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function attributes()
    {
        return $this->hasMany(Attribute::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}
