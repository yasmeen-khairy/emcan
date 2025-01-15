<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::create([
            'title' => 'Laravel',
            'description' => 'laravel course details',
            'start_date' => '2025-01-18',
            'end_date' => '2025-07-20',
        ]);

        Course::create([
            'title' => 'javascript',
            'description' => 'javascript course details',
            'start_date' => '2025-01-18',
            'end_date' => '2025-07-20',
        ]);
    }
}
