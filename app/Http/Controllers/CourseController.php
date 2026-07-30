<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Contracts\View\View;
use Laravel\Head\Facades\Head;

class CourseController
{
    public function show(Course $course): View
    {
        abort_if(! $course->is_published || $course->opened_at === null, 404);

        Head::title($course->meta['title'])
            ->description($course->meta['description']);

        return view('pages.courses.show', [
            'course' => $course->load(['lecturer', 'modules', 'venue']),
        ]);
    }
}
