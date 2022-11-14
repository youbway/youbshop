<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use App\Http\Controllers\Admin\BrandController;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // $this->call(AdminsTableSeeder::class);
        // $this->call(VendorsTableSeeder::class);
        // $this->call(VendorBusinessDetailsSeeder::class);
        // $this->call(VendorBankDetailsSeeder::class);
        // $this->call(SectionsTabelSeeder::class);
        // $this->call(CategoriesTableSeeder::class);
        // $this->call(BrandsTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
    }
}
