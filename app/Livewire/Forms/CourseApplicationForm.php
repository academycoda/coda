<?php

namespace App\Livewire\Forms;

use App\Enums\ApplicationStatus;
use App\Models\Application;
use App\Models\Course;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CourseApplicationForm extends Form
{
    #[Validate(['required', 'string', 'max:80'])]
    public string $first_name = '';

    #[Validate(['required', 'string', 'max:80'])]
    public string $last_name = '';

    #[Validate(['required', 'email', 'max:255'])]
    public string $email = '';

    #[Validate(['required', 'date', 'before:today'])]
    public string $birth_date = '';

    #[Validate(['required', 'string', 'max:255'])]
    public string $school = '';

    #[Validate(['required', 'string', 'min:20', 'max:2000'])]
    public string $bio = '';

    #[Validate(['nullable', 'string', 'max:255'])]
    public string $guardian_name = '';

    #[Validate(['nullable', 'email', 'max:255'])]
    public string $guardian_email = '';

    #[Validate(['nullable', 'string', 'max:40'])]
    public string $guardian_phone = '';

    #[Validate(['accepted'])]
    public bool $consent = false;

    #[Validate(['bool'])]
    public bool $marketing_consent = false;

    public function store(Course $course): Application
    {
        $this->validate();
        $this->validateGuardianFields();

        return DB::transaction(function () use ($course): Application {
            $application = new Application;
            $application->course()->associate($course);
            $application->first_name = $this->first_name;
            $application->last_name = $this->last_name;
            $application->email = $this->email;
            $application->birth_date = Carbon::parse($this->birth_date);
            $application->school = $this->school;
            $application->bio = $this->bio;
            $application->guardian_name = $this->guardian_name ?: null;
            $application->guardian_phone = $this->guardian_phone ?: null;
            $application->guardian_email = $this->guardian_email ?: null;
            $application->marketing_consent = $this->marketing_consent;
            $application->status = ApplicationStatus::Submitted;
            $application->save();

            return $application;
        });
    }

    public function firstName(): string
    {
        return $this->first_name;
    }

    public function age(): ?int
    {
        if ($this->birth_date === '') {
            return null;
        }

        return Carbon::parse($this->birth_date)->age;
    }

    public function requiresGuardian(): bool
    {
        $age = $this->age();

        return $age !== null && $age < 18;
    }

    private function validateGuardianFields(): void
    {
        if (! $this->requiresGuardian()) {
            return;
        }

        $messages = [];

        if (trim($this->guardian_name) === '') {
            $messages['form.guardian_name'] = 'Vyplň meno rodiča alebo zákonného zástupcu.';
        }

        if (trim($this->guardian_email) === '' && trim($this->guardian_phone) === '') {
            $messages['form.guardian_email'] = 'Vyplň email alebo telefón na rodiča.';
            $messages['form.guardian_phone'] = 'Vyplň email alebo telefón na rodiča.';
        }

        if ($messages !== []) {
            throw ValidationException::withMessages($messages);
        }
    }
}
