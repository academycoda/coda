<?php

namespace App\Livewire;

use App\Livewire\Forms\CourseApplicationForm;
use App\Mail\ApplicationSubmitted;
use App\Models\Course;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Livewire\Component;

class CourseApplication extends Component
{
    #[Locked]
    public Course $course;

    public CourseApplicationForm $form;

    public bool $submitted = false;

    public function submit(): void
    {
        abort_unless($this->course->is_open, 404);

        $application = $this->form->store($this->course);

        Mail::to($application->email)->send(new ApplicationSubmitted($application));

        $this->submitted = true;
    }

    #[Computed]
    public function firstName(): string
    {
        return $this->form->firstName();
    }

    #[Computed]
    public function requiresGuardian(): bool
    {
        return $this->form->requiresGuardian();
    }

    public function render(): View
    {
        return view('livewire.course-application');
    }
}
