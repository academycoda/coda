<?php

namespace Database\Factories;

use App\Models\Guardian;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<Guardian> */
class GuardianFactory extends Factory
{
    protected $model = Guardian::class;

    /** @return array<string, mixed> */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->optional()->safeEmail(),
            'phone' => fake()->optional()->phoneNumber(),
            'relationship' => fake()->randomElement(['parent', 'legal representative']),
        ];
    }
}
