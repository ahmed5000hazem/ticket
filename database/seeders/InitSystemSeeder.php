<?php

namespace Database\Seeders;

use App\Models\Admins\Admin;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InitSystemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Admin::updateOrCreate(['email' => 'admin@admin.com'],
        [
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'phone' => '01123456789',
            'password' => bcrypt('123456')
        ]);

        $admin->syncRole(['superadministrator']);
    }
}
