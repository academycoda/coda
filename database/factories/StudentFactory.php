<?php

namespace Database\Factories;

use App\Models\Guardian;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<Student> */
class StudentFactory extends Factory
{
    protected $model = Student::class;

    /** @return array<string, mixed> */
    public function definition(): array
    {
        return [
            'guardian_id' => null,
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->optional()->phoneNumber(),
            'birth_date' => fake()->dateTimeBetween('-19 years', '-15 years'),
            'school' => fake()->optional()->randomElement([
                'Northbridge Academy',
                'Riverside Technical School',
                'Oakfield Business College',
                'Westhaven Grammar School',
                'Silverpine Secondary School',
            ]),
            'bio' => fake()->optional()->paragraph(),
            'notes' => null,
        ];
    }

    public function withGuardian(): static
    {
        return $this->state(fn (): array => [
            'guardian_id' => Guardian::factory(),
        ]);
    }
}
