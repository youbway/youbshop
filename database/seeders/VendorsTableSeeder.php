<?php

namespace Database\Seeders;

use App\Models\Vendor;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $add = $faker->address();
        $vendorRecords = [
            [
                'name' => $faker->name,
                'address' => $add,
                'city' => $faker->city(),
                'state' => $faker->state(),
                'country' => $faker->country(),
                'pincode' => $faker->postcode(),
                'mobile' => '0750505055',
                'email' => $faker->email(),
                'admin_id' => 2,
                'status' => 1,
            ]
        ];

        Vendor::insert($vendorRecords);
    }
}
