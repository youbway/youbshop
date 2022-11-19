<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Vendor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'city',
        'state',
        'country',
        'pincode',
        'mobile',
        'email'
    ];



    public static function rules()
    {
        return [
            'address' =>'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required|exists:countries,country_name',
            'pincode' => 'required|numeric',
        ];
    }


    //=============relations==================


    public function business () {
        return $this->hasOne(VendorBusinessDetails::class);
    }

    public function bank () {
        return $this->hasOne(VendorBankDetails::class);
    }
}
