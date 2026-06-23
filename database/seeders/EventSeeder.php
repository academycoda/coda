<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Venue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        Event::factory()
            ->count(5)
            ->recycle(Venue::all())
            ->create();
    }
}
