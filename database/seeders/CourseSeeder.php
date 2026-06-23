<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Lecturer;
use App\Models\Module;
use App\Models\Venue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        Course::factory()
            ->count(3)
            ->sequence(
                [
                    'title' => 'Laravel from Scratch',
                    'slug' => 'laravel-from-scratch',
                    'published_at' => now()->subMonth(),
                    'opened_at' => now()->addWeek(),
                    'closed_at' => now()->addMonth(),
                    'start_date' => now()->addMonths(6),
                    'end_date' => now()->addMonths(18),
                ],
                [
                    'title' => 'Frontend Junior',
                    'slug' => 'frontend-junior',
                    'published_at' => now()->subWeek(),
                    'opened_at' => null,
                    'closed_at' => null,
                    'start_date' => now()->addMonths(12),
                    'end_date' => now()->addMonths(24),
                ],
                [
                    'title' => 'AI for Creatives',
                    'slug' => 'ai-for-creatives',
                    'published_at' => null,
                    'opened_at' => null,
                    'closed_at' => null,
                ],
            )
            ->has(Module::factory()->count(10))
            ->recycle(Lecturer::all())
            ->recycle(Venue::all())
            ->create();
    }
}
