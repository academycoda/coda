<?php

use App\Models\Course;
use App\Models\Module;

test('can see an opened course page', function (): void {
    // Arrange
    $course = Course::factory()
        ->has(
            Module::factory()->state([
                'title' => 'HTML and CSS Basics',
                'position' => 2,
            ])
        )
        ->has(
            Module::factory()->state([
                'title' => 'Laravel Application',
                'position' => 1,
            ])
        )
        ->open()
        ->create([
            'title' => 'Web From Scratch',
            'slug' => 'web-from-scratch',
            'tagline' => 'Modern web development from the first day.',
            'description' => 'A course for students who want to understand real web development.',
            'meta' => [
                'title' => 'Web From Scratch | Coda',
                'description' => 'A practical web development course for students.',
            ],
        ]);

    // Act
    $response = $this->get(route('courses.show', $course));

    // Assert
    $response
        ->assertOk()
        ->assertViewIs('pages.courses.show')
        ->assertViewHas('course', function (Course $viewCourse) use ($course): bool {
            return $viewCourse->is($course)
                && $viewCourse->relationLoaded('lecturer')
                && $viewCourse->relationLoaded('modules')
                && $viewCourse->relationLoaded('venue');
        })
        ->assertSeeText('Web From Scratch')
        ->assertSeeText('Modern web development from the first day.')
        ->assertSeeTextInOrder([
            'Laravel Application',
            'HTML and CSS Basics',
        ]);
});

test('does not show unpublished course pages', function (): void {
    // Arrange
    $course = Course::factory()
        ->draft()
        ->create([
            'slug' => 'internal-draft',
        ]);

    // Act
    $response = $this->get(route('courses.show', $course));

    // Assert
    $response->assertNotFound();
});

test('does not show course pages without an application opening date', function (): void {
    // Arrange
    $course = Course::factory()
        ->create([
            'published_at' => now()->subWeek(),
            'opened_at' => null,
            'closed_at' => now()->addMonth(),
            'slug' => 'planned-course',
        ]);

    // Act
    $response = $this->get(route('courses.show', $course));

    // Assert
    $response->assertNotFound();
});
