<?php

namespace Database\Seeders;

use App\Models\Patien;
use App\Models\User;
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
        User::factory()->create(
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'phone' => '081234567890',
                'address' => 'Jl. Admin',
                'password' => bcrypt('admin'),
                'role' => 'admin',
            ]
        );

        User::factory()->create(
            [
                'name' => 'User',
                'email' => 'user@gmail.com',
                'phone' => '081234567890',
                'address' => 'Jl. User',
                'password' => bcrypt('user'),
                'role' => 'user',
            ]
        );

        // User::factory(10)->create();

        // Patien::factory(100)->create();
    }
}
