<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // Super Admin
        User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@bima.com',
            'password' => Hash::make('password'),
            'phone' => '081234567890',
            'role' => 'super_admin',
            'is_active' => true,
            'email_verified_at' => now(),
        ]);

        // Regular Admin
        User::create([
            'name' => 'Admin BIMA',
            'email' => 'admin@bima.com',
            'password' => Hash::make('password'),
            'phone' => '081234567891',
            'role' => 'admin',
            'is_active' => true,
            'email_verified_at' => now(),
        ]);

        $this->command->info('✅ Admin users created successfully!');
        $this->command->info('📧 Super Admin: superadmin@bima.com / password');
        $this->command->info('📧 Admin: admin@bima.com / password');
    }
}