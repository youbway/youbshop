<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id',
        'secion_id',
        'name',
        'image',
        'discount',
        'description',
        'url',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'status',
    ];


    public static function rules ($id = null) {

        $rules = [
            'name' => 'required|string',
            'section_id' => "required|exists:sections,id",
            'parent_id' => "required",Rule::exists('categories', 'id')->where(function ($query) {
                return $query->where('id', 0);
            }),
            'description' =>'required|string',
            'url' => 'required|regex:(([a-z0-9+!*(),;?&=\$_.-]+(\:[a-z0-9+!*(),;?&=\$_.-]+)?@)?)',
            'discount' => 'required|numeric',
            'meta_title' => 'required|string',
            'meta_description' => 'required|string',
            'meta_keywords' => 'required|string',
        ];
        if ($id) {
            # code...
        }

        return $rules;

    }
    //====================relations===============
    public function parentCategory()
    {
        return $this->belongsTo(Category::class,'parent_id', 'id')->select('id', 'name','parent_id');
    }

    public function subCategories()
    {
        return $this->hasMany(Category::class,'parent_id', 'id')->select('id', 'name','parent_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class,'section_id', 'id')->select('id', 'name');
    }
}
