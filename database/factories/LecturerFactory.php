<?php

namespace Database\Factories;

use App\Models\Lecturer;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<Lecturer> */
class LecturerFactory extends Factory
{
    protected $model = Lecturer::class;

    /** @return array<string, mixed> */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'role' => fake()->jobTitle(),
            'bio' => fake()->paragraph(),
            'tags' => fake()->randomElements(['Laravel', 'PHP', 'Frontend', 'AI workflow', 'Mentoring', 'Product'], 3),
            'links' => [
                'website' => fake()->url(),
                'github' => 'https://github.com/'.fake()->userName(),
            ],
        ];
    }
}
