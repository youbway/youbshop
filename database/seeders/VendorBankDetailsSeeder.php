<?php

namespace Database\Seeders;

use App\Models\VendorBankDetails;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorBankDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = [
            [
                'id' => '1',
                'vendor_id' => '1',
                'account_holder_name' => 'John Cena',
                'bank_name' => 'BDL',
                'account_number' => '0243530500022',
                'bank_ifsc_number' => '24353563',
            ],
        ];
        VendorBankDetails::insert($records);
    }
}
