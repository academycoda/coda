<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Contracts\View\View;

class CourseController
{
    public function show(Course $course): View
    {
        abort_if(! $course->is_published || $course->opened_at === null, 404);

        return view('pages.courses.show', [
            'course' => $course->load(['lecturer', 'modules', 'venue']),
        ]);
    }
}
