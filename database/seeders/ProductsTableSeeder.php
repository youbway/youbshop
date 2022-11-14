<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            [
                'section_id' => 2,
                'category_id' => 7,
                'brand_id' => 6,
                'vendor_id' => 1,
                'admin_type' => 'vendor',
                'name' => 'Redmi Note 11',
                'code' => 'RN11',
                'color' => 'Blue',
                'description' => '',
                'price' => 1500,
                'discount' => 10,
                'weight' => 500,
                'image' => '',
                'video' => '',
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'is_featured' => 'yes',
                'status' => 1,
            ],
            [
                'section_id' => 1,
                'category_id' => 8,
                'brand_id' => 1,
                'vendor_id' => 0,
                'admin_type' => 'superAdmin',
                'name' => 'Red Casual T-shirt',
                'code' => 'RC001',
                'color' => 'Red',
                'description' => '',
                'price' => 50,
                'discount' => 20,
                'weight' => 10,
                'image' => '',
                'video' => '',
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'is_featured' => 'yes',
                'status' => 1,
            ],
        ];

        Product::insert($items);

    }
}
