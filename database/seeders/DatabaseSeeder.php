<?php

namespace Database\Seeders;

use App\Models\Patien;
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
        \App\Models\User::factory(10)->create();

        Patien::factory(100)->create();
    }
}
