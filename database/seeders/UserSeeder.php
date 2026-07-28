<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Create acc Admin
        User::create([
            'name' => 'Admin RS',
            'email' => 'admin@rs.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        // Create acc Staff / Resepsionis
        User::create([
            'name' => 'Staff Resepsionis',
            'email' => 'staff@rs.com',
            'password' => Hash::make('password123'),
            'role' => 'staff',
        ]);
    }
}
