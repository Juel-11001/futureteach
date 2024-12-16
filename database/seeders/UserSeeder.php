<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'name' => 'Super Admin',
                'username' => 'superadmin',
                'phone' => '1234567890',
                'email' => 'superadmin@gmail.com',
                'role' => 'super_admin',
                'status' => 'active',
                'password'=> bcrypt('password'),
            ],[
                'name' => 'Admin',
                'username' => 'admin',
                'phone' => '1234567890',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'status' => 'active',
                'password'=> bcrypt('password'),
            ],[
                'name' => 'User',
                'username' => 'user',
                'phone' => '1234567890',
                'email' => 'user@gmail.com',
                'role' => 'user',
                'status' => 'active',
                'password'=> bcrypt('password'),
            ]
        ]);
    }
}
