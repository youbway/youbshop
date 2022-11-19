<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status'
    ];


    public static function rules() {
        return [
            'name' => 'required|string'
        ];
    }

    //====================relations===============

    //note on this method it will return the section with main categories and this last with it's subCategories
    public function categories()
    {
        return $this->hasMany(Category::class)->select('id', 'name', 'section_id')->where(['parent_id'=> 0, 'status' => 1])->with('subCategories');
    }

}
