<?php

namespace Database\Factories;

use App\Enums\EventStatus;
use App\Enums\EventType;
use App\Models\Event;
use App\Models\Venue;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<Event> */
class EventFactory extends Factory
{
    protected $model = Event::class;

    /** @return array<string, mixed> */
    public function definition(): array
    {
        return [
            'venue_id' => Venue::factory(),
            'title' => $title = fake()->unique()->sentence(3),
            'slug' => str($title)->slug(),
            'type' => fake()->randomElement(EventType::class),
            'description' => fake()->paragraph(),
            'status' => EventStatus::Draft,
            'capacity' => fake()->optional()->numberBetween(10, 40),
            'price' => '0.00',
            'started_at' => $start = fake()->dateTimeBetween('+1 month', '+1 year'),
            'ended_at' => fake()->dateTimeBetween($start, '+1 year'),
        ];
    }

    public function scheduled(): static
    {
        return $this->state(fn (): array => [
            'status' => EventStatus::Scheduled,
        ]);
    }
}
