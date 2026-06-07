<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@jakabaring.com',
            'password' => bcrypt('admin123'),
            'role' => 'admin'
        ]);
    }
}