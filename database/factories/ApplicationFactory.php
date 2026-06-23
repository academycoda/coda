<?php

namespace Database\Factories;

use App\Enums\ApplicationStatus;
use App\Models\Application;
use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<Application> */
class ApplicationFactory extends Factory
{
    protected $model = Application::class;

    /** @return array<string, mixed> */
    public function definition(): array
    {
        return [
            'course_id' => Course::factory(),
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'email' => fake()->safeEmail(),
            'birth_date' => fake()->dateTimeBetween('-19 years', '-15 years'),
            'school' => fake()->company().' High School',
            'bio' => fake()->paragraph(),
            'guardian_name' => null,
            'guardian_email' => null,
            'guardian_phone' => null,
            'marketing_consent' => false,
            'status' => ApplicationStatus::Submitted,
            'review' => null,
            'reviewed_at' => null,
        ];
    }

    public function accepted(): static
    {
        return $this->state(fn (): array => [
            'status' => ApplicationStatus::Accepted,
            'review' => fake()->paragraph(),
            'reviewed_at' => now(),
        ]);
    }
}
