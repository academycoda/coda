<?php

namespace Database\Seeders;

use App\Models\Application;
use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApplicationSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        Application::factory()
            ->count(50)
            ->recycle(Course::all())
            ->create();
    }
}
