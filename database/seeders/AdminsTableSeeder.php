<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = [
            ['id' => 1,
            'name' => 'youb',
            'type' => 'superAdmin',
            'vendor_id' => 0,
            'mobile' => '0750505050',
            'email' => 'admin@admin.com',
            'password' => '$2a$12$MVpNUEr5OOXOd49IyRL2Du9B2ugy2Co47u5cFQy2e70mfstZ.Bnme',
            'image' => '',
            'status' => 1],

            ['id' => 2,
            'name' => 'wass',
            'type' => 'vendor',
            'vendor_id' => 1,
            'mobile' => '0750505055',
            'email' => 'wass@admin.com',
            'password' => '$2a$12$MVpNUEr5OOXOd49IyRL2Du9B2ugy2Co47u5cFQy2e70mfstZ.Bnme',
            'image' => '',
            'status' => 1],

        ];
        Admin::insert($admins);
    }
}
