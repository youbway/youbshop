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
        $admin = [
            'id' => 1,
            'name' => 'super admin',
            'type' => 'superadmin',
            'vendor_id' => 0,
            'mobile' => '0750505050',
            'email' => 'admin@admin.com',
            'password' => '$2a$12$MVpNUEr5OOXOd49IyRL2Du9B2ugy2Co47u5cFQy2e70mfstZ.Bnme',
            'image' => '',
            'status' => 1
        ];
        Admin::insert($admin);
    }
}
