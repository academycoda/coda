<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Module;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<Module> */
class ModuleFactory extends Factory
{
    protected $model = Module::class;

    /** @return array<string, mixed> */
    public function definition(): array
    {
        static $position = 1;

        return [
            'course_id' => Course::factory(),
            'title' => fake()->sentence(3),
            'section' => fake()->randomElement(['A.', 'B.', 'C.']),
            'description' => fake()->sentence(),
            'tags' => fake()->randomElements(['HTML', 'CSS', 'Laravel', 'AI', 'Git', 'Deploy'], 3),
            'position' => $position++,
        ];
    }
}
