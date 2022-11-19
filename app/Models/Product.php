<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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








    // ================= relations ==================
    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
