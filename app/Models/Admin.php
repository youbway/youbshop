<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class Admin extends Authenticatable
{

    use HasFactory;

    protected $guard = "admin";

    protected $fillable = [
        'name',
        'email',
        'type',
        'mobile',
        'password',
        'image',
        'status',
    ];

    public function getImageAttribute()
    {
        return Str::swap(['public' => 'storage'], $this->attributes['image']);
    }

    public static function AdminVendorRules()
    {
        return [
            'name' => 'required|regex:/^[\pL\s\-]+$/u',
            'mobile' => 'required|numeric',
        ];
    }

    //=============relations==================
    public function vendor()
    {
        //i know it should be one to many but i never used one to one so i want to try it knox
        return $this->hasOne(Vendor::class);
    }
}
