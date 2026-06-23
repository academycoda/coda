<?php

namespace Database\Seeders;

use App\Models\Lecturer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LecturerSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        Lecturer::factory()
            ->count(1)
            ->create();
    }
}
