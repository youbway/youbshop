<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorBankDetails extends Model
{
    use HasFactory;

    protected $table = "vendors_bank_details";

    protected $fillable = [
        "account_holder_name",
        "bank_name",
        "account_number",
        "bank_ifsc_number"
    ];


    //===================validation==================
    public static function rules () {
        return [
            "account_holder_name" => "required",
            "bank_name" => "required",
            "account_number" => "required|numeric",
            "bank_ifsc_number" => "required|numeric",
        ];
    }


    //===================relations===================
}
