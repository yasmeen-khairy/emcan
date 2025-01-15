<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UsersSeeder;
use Database\Seeders\CoursesSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         // Seed users
    $this->call(UsersSeeder::class);

    // Seed courses
    $this->call(CoursesSeeder::class);
    }
}
