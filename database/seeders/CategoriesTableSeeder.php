<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['parent_id' => 0, 'section_id' =>1, 'Name' => 'Men', 'image' => '', 'discount' => 0, 'description' => '', 'url' => 'men', 'meta_title' => '', 'meta_description' => '', 'meta_keywords' => '', 'status' => 1],
            ['parent_id' => 0, 'section_id' =>1, 'Name' => 'Women', 'image' => '', 'discount' => 0, 'description' => '', 'url' => 'women', 'meta_title' => '', 'meta_description' => '', 'meta_keywords' => '', 'status' => 1],
            ['parent_id' => 0, 'section_id' =>1, 'Name' => 'Kids', 'image' => '', 'discount' => 0, 'description' => '', 'url' => 'kids', 'meta_title' => '', 'meta_description' => '', 'meta_keywords' => '', 'status' => 1],
        ];
        Category::insert($items);
    }
}
