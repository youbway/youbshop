<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class VendorBusinessDetails extends Model
{
    use HasFactory;
    protected $table = "vendors_business_details";

    protected $fillable = [
            "shop_name" ,
            'shop_address' ,
            'shop_city' ,
            'shop_state' ,
            'shop_country' ,
            'shop_pincode' ,
            'shop_mobile' ,
            'shop_website' ,
            'shop_email' ,
            'address_proof' ,
            'address_proof_image' ,
            'business_license_number' ,
            'gst_number',
            'pan_number'
    ];


        //=============validation==================

    public static function rules($imageRequired = false)
    {
        $rules = [
            "shop_name" => 'required',
            'shop_address' => 'required',
            'shop_city' => 'required',
            'shop_state' => 'required',
            'shop_country' => 'required|exists:countries,country_name',
            'shop_pincode' => 'required',
            'shop_mobile' => 'required',
            'shop_website' => 'required|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
            'shop_email' => 'required|email',
            'business_license_number' => 'required|numeric',
            'gst_number' => 'required|numeric',
            'pan_number' => 'required|numeric',
            'address_proof' => 'required',
            'address_proof_image' => 'mimes:pdf,jpg,jpeg,png',
        ];
        if($imageRequired) {
            $rules = array_merge($rules, ['address_proof_image' => 'required|mimes:pdf,jpg,jpeg,png']);
        }
        return $rules;

    }


    //=============attributes==================

    public function getAddressProofImageAttribute()
    {
        return Str::swap(['public' => 'storage'], $this->attributes['address_proof_image']);
    }

    //=============relations==================
    public function vendor () {
        return $this->hasOne(Vendor::class);
    }
}
