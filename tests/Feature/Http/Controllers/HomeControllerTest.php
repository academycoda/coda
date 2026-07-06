<?php

use App\Models\Course;

test('can see home page with published courses ordered by start date', function (): void {
    // Arrange
    $laterCourse = Course::factory()
        ->published()
        ->create([
            'title' => 'Laravel for Beginners',
            'start_date' => now()->addMonths(4),
            'end_date' => now()->addMonths(7),
        ]);

    $earlierCourse = Course::factory()
        ->published()
        ->create([
            'title' => 'Web From Scratch',
            'start_date' => now()->addMonths(2),
            'end_date' => now()->addMonths(5),
        ]);

    $draftCourse = Course::factory()
        ->draft()
        ->create([
            'title' => 'Internal Draft',
        ]);

    // Act
    $response = $this->get(route('home'));

    // Assert
    $response
        ->assertOk()
        ->assertViewIs('pages.static.home')
        ->assertViewHas('courses', function ($courses) use ($draftCourse, $earlierCourse, $laterCourse): bool {
            return $courses->pluck('id')->all() === [
                $earlierCourse->id,
                $laterCourse->id,
            ] && ! $courses->contains($draftCourse);
        })
        ->assertSeeTextInOrder([
            'Web From Scratch',
            'Laravel for Beginners',
        ])
        ->assertDontSeeText('Internal Draft');
});
