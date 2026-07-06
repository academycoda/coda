<?php

use App\Enums\ApplicationStatus;
use App\Livewire\CourseApplication;
use App\Mail\ApplicationSubmitted;
use App\Models\Application;
use App\Models\Course;
use Illuminate\Support\Facades\Mail;
use Livewire\Livewire;

test('submits an application for an open course', function (): void {
    // Arrange
    Mail::fake();
    $course = Course::factory()->open()->create();

    // Act
    Livewire::test(CourseApplication::class, ['course' => $course])
        ->set(validApplicationPayload())
        ->call('submit')
        ->assertHasNoErrors()
        ->assertSet('submitted', true)
        ->assertSee('Jane');

    // Assert
    $application = Application::query()->sole();

    expect($application)
        ->course_id->toBe($course->id)
        ->first_name->toBe('Jane')
        ->last_name->toBe('Doe')
        ->email->toBe('jane@example.com')
        ->birth_date->toDateString()->toBe('2005-04-15')
        ->school->toBe('Central High School')
        ->bio->toBe('I build websites after school and enjoy Laravel and design.')
        ->guardian_name->toBeNull()
        ->guardian_email->toBeNull()
        ->guardian_phone->toBeNull()
        ->status->toBe(ApplicationStatus::Submitted);

    Mail::assertQueued(ApplicationSubmitted::class, function (ApplicationSubmitted $mail) use ($application): bool {
        return $mail->hasTo('jane@example.com')
            && $mail->application->is($application);
    });
});

test('requires guardian contact details for minor applicants', function (): void {
    // Arrange
    Mail::fake();
    $course = Course::factory()->open()->create();

    // Act
    Livewire::test(CourseApplication::class, ['course' => $course])
        ->set(validApplicationPayload([
            'form.birth_date' => now()->subYears(16)->toDateString(),
        ]))
        ->call('submit')
        ->assertHasErrors([
            'form.guardian_name',
            'form.guardian_email',
            'form.guardian_phone',
        ]);

    // Assert
    expect(Application::query()->count())->toBe(0);
    Mail::assertNothingQueued();
});

test('submits minor application when guardian contact is provided', function (): void {
    // Arrange
    Mail::fake();
    $course = Course::factory()->open()->create();

    // Act
    Livewire::test(CourseApplication::class, ['course' => $course])
        ->set(validApplicationPayload([
            'form.birth_date' => now()->subYears(16)->toDateString(),
            'form.guardian_name' => 'Mary Doe',
            'form.guardian_email' => 'mary@example.com',
        ]))
        ->call('submit')
        ->assertHasNoErrors()
        ->assertSet('submitted', true);

    // Assert
    $application = Application::query()->sole();

    expect($application)
        ->guardian_name->toBe('Mary Doe')
        ->guardian_email->toBe('mary@example.com')
        ->guardian_phone->toBeNull();

    Mail::assertQueued(ApplicationSubmitted::class);
});

test('validates required application fields', function (): void {
    // Arrange
    Mail::fake();
    $course = Course::factory()->open()->create();

    // Act
    Livewire::test(CourseApplication::class, ['course' => $course])
        ->call('submit')
        ->assertHasErrors([
            'form.first_name' => 'required',
            'form.last_name' => 'required',
            'form.email' => 'required',
            'form.birth_date' => 'required',
            'form.school' => 'required',
            'form.bio' => 'required',
            'form.consent' => 'accepted',
        ]);

    // Assert
    expect(Application::query()->count())->toBe(0);
    Mail::assertNothingQueued();
});

test('exposes applicant first name and guardian requirement as computed state', function (): void {
    // Arrange
    $course = Course::factory()->open()->create();

    // Act & Assert
    Livewire::test(CourseApplication::class, ['course' => $course])
        ->set('form.first_name', 'Jane')
        ->set('form.birth_date', now()->subYears(16)->toDateString())
        ->assertSet('firstName', 'Jane')
        ->assertSet('requiresGuardian', true)
        ->set('form.birth_date', now()->subYears(20)->toDateString())
        ->assertSet('requiresGuardian', false);
});

test('does not submit applications for courses that are not open', function (): void {
    // Arrange
    Mail::fake();
    $course = Course::factory()->published()->create();

    // Act
    Livewire::test(CourseApplication::class, ['course' => $course])
        ->set(validApplicationPayload())
        ->call('submit')
        ->assertStatus(404);

    // Assert
    expect(Application::query()->count())->toBe(0);
    Mail::assertNothingQueued();
});

/** @return array<string, mixed> */
function validApplicationPayload(array $overrides = []): array
{
    return [
        ...[
            'form.first_name' => 'Jane',
            'form.last_name' => 'Doe',
            'form.email' => 'jane@example.com',
            'form.birth_date' => '2005-04-15',
            'form.school' => 'Central High School',
            'form.bio' => 'I build websites after school and enjoy Laravel and design.',
            'form.guardian_name' => '',
            'form.guardian_email' => '',
            'form.guardian_phone' => '',
            'form.consent' => true,
        ],
        ...$overrides,
    ];
}
