<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Ahmed',
            'email' => 'ahmed@example.com',
            'password' => Hash::make('secret'),
            'role' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'sara',
            'email' => 'sara@example.com',
            'password' => Hash::make('secret'),
            'role' => 'user',
        ]);
    }
}
