<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Lecturer;
use App\Models\Venue;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/** @extends Factory<Course> */
class CourseFactory extends Factory
{
    protected $model = Course::class;

    /** @return array<string, mixed> */
    public function definition(): array
    {
        return [
            'venue_id' => Venue::factory(),
            'lecturer_id' => Lecturer::factory(),
            'title' => $title = fake()->unique()->sentence(3),
            'slug' => str($title)->slug(),
            'tagline' => fake()->sentence(4),
            'excerpt' => fake()->paragraph(2),
            'description' => fake()->paragraph(),
            'audience' => 'students',
            'capacity' => fake()->numberBetween(8, 20),
            'price' => 0.0,
            'published_at' => null,
            'opened_at' => null,
            'closed_at' => null,
            'start_date' => $start = Carbon::instance(fake()->dateTimeBetween('+1 month', '+1 year'))->startOfDay(),
            'end_date' => $start->copy()->addWeeks(fake()->numberBetween(8, 20)),
            'outcomes' => fake()->sentences(mt_rand(3, 5)),
            'faqs' => [],
            'tags' => fake()->randomElements(['HTML', 'CSS', 'PHP', 'Laravel', 'Blade', 'Tailwind', 'AI', 'Git'], 4),
        ];
    }

    public function draft(): static
    {
        return $this->state(fn (): array => [
            'published_at' => null,
            'opened_at' => null,
            'closed_at' => null,
        ]);
    }

    public function published(): static
    {
        return $this->state(fn (): array => [
            'published_at' => now()->subWeek(),
            'opened_at' => now()->addWeek(),
            'closed_at' => now()->addMonth(),
        ]);
    }

    public function open(): static
    {
        return $this->state(fn (): array => [
            'published_at' => now()->subWeek(),
            'opened_at' => now()->subDay(),
            'closed_at' => now()->addMonth(),
            'start_date' => now()->addMonths(2),
            'end_date' => now()->addMonths(5),
        ]);
    }
}
